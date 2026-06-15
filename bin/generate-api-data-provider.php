<?php declare(strict_types=1);

use AndrewGos\TelegramBot\Request\RequestInterface;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/BaseFixtureGenerator.php';

$interfaceFile = __DIR__ . '/../src/Api/ApiInterface.php';
$outputFile = __DIR__ . '/../tests/DataProvider/ApiDataProvider.php';

$content = file_get_contents($interfaceFile);

// Extract methods with their full signatures
preg_match_all('/public function (\w+)\(([^)]*)\)\s*:\s*([A-Za-z\\\]+)/', $content, $matches, PREG_SET_ORDER);

function createMinimalRequestForApi(string $requestClass): ?string
{
    if (!class_exists($requestClass) || !is_subclass_of($requestClass, RequestInterface::class)) {
        return null;
    }

    $ref = new ReflectionClass($requestClass);
    if ($ref->isAbstract() || $ref->isInterface()) {
        return null;
    }

    $constructor = $ref->getConstructor();
    if ($constructor === null) {
        return "new \\{$requestClass}()";
    }

    $params = $constructor->getParameters();
    $args = [];

    foreach ($params as $param) {
        $paramName = $param->getName();
        if ($param->isOptional()) {
            continue;
        }
        $type = $param->getType();
        if ($type === null) {
            continue;
        }
        $resolved = resolveApiParamType($type, $param, $paramName);
        if ($resolved !== null) {
            $args[] = "{$paramName}: {$resolved}";
        }
    }

    if (empty($args)) {
        // Check if the request has NO properties at all (empty request)
        $props = $ref->getProperties();
        if (empty($props)) {
            // Skip empty requests that cause serialization issues
            return null;
        }
        return "new \\{$requestClass}()";
    }

    return "new \\{$requestClass}(\n            " . implode(",\n            ", $args) . ",\n        )";
}

function resolveApiParamType(ReflectionType $type, ReflectionParameter $param, string $paramName): ?string
{
    $type = flattenUnion($type);
    if (!$type instanceof ReflectionNamedType) {
        return 'null';
    }
    $common = resolveCommonType($type, $paramName);
    if ($common !== null) {
        return $common;
    }
    $name = $type->getName();
    if (str_starts_with($name, 'AndrewGos\\TelegramBot\\Entity\\')) {
        $entityRef = new ReflectionClass($name);
        if ($entityRef->isAbstract() || $entityRef->isInterface()) {
            $concrete = findConcreteEntitySubclass($name);
            if ($concrete !== null) {
                $name = $concrete;
            } else {
                return null;
            }
        }
        $ref = new ReflectionClass($name);
        if ($ref->isAbstract() || $ref->isInterface()) { return null; }
        $constructor = $ref->getConstructor();
        if ($constructor === null) { return "new \\{$name}()"; }
        $eArgs = [];
        foreach ($constructor->getParameters() as $ep) {
            if ($ep->isOptional()) { continue; }
            $et = $ep->getType();
            if ($et === null) { continue; }
            $ev = resolveApiParamType($et, $ep, $ep->getName());
            if ($ev !== null) {
                $eArgs[] = $ep->getName() . ': ' . $ev;
            }
        }
        if (!empty($eArgs)) {
            return "new \\{$name}(\n                " . implode(",\n                ", $eArgs) . ",\n            )";
        }
        return "new \\{$name}()";
    }
    if (str_starts_with($name, 'AndrewGos\\TelegramBot\\')) {
        return 'null';
    }
    return null;
}

$entries = [];

foreach ($matches as $match) {
    $methodName = $match[1];
    $paramsStr = $match[2];
    $returnType = $match[3];

    // Skip non-API methods
    if (in_array($methodName, ['getVersion', 'getToken', 'getLogger', 'isThrowOnErrorResponse'], true)) {
        continue;
    }

    // Extract request class from parameter
    $requestExpr = 'null';
    if (preg_match('/Req\\\\(\w+)/', $paramsStr, $rm)) {
        $requestClassName = 'AndrewGos\\TelegramBot\\Request\\' . $rm[1];
        if (class_exists($requestClassName)) {
            $minimal = createMinimalRequestForApi($requestClassName);
            if ($minimal !== null) {
                $requestExpr = $minimal;
            } else {
                continue;
            }
        } else {
            continue;
        }
    }

    // Determine response class
    $responseClass = null;
    if (str_starts_with($returnType, 'Res\\')) {
        $responseClass = 'AndrewGos\\TelegramBot\\Response\\' . substr($returnType, 4);
    } elseif ($returnType === 'RawResponse') {
        $responseClass = 'AndrewGos\\TelegramBot\\Response\\RawResponse';
    } else {
        continue;
    }

    // Determine result type
    $resultExpr = "['ok' => true, 'result' => 0]";

    $entries[] = [
        'method' => $methodName,
        'requestExpr' => $requestExpr,
        'responseClass' => $responseClass,
        'resultExpr' => $resultExpr,
    ];
}

// Generate output
$output = "<?php\n\ndeclare(strict_types=1);\n\nnamespace AndrewGos\\TelegramBot\\Tests\\DataProvider;\n\n";
$output .= "use AndrewGos\\TelegramBot\\Request;\n";
$output .= "use AndrewGos\\TelegramBot\\Response;\n";
$output .= "use AndrewGos\\TelegramBot\\ValueObject\\BotToken;\n";
$output .= "use AndrewGos\\TelegramBot\\ValueObject\\ChatId;\n";
$output .= "use AndrewGos\\TelegramBot\\ValueObject\\Email;\n";
$output .= "use AndrewGos\\TelegramBot\\ValueObject\\EncodedJson;\n";
$output .= "use AndrewGos\\TelegramBot\\ValueObject\\Filename;\n";
$output .= "use AndrewGos\\TelegramBot\\ValueObject\\IpV4;\n";
$output .= "use AndrewGos\\TelegramBot\\ValueObject\\IpV6;\n";
$output .= "use AndrewGos\\TelegramBot\\ValueObject\\Language;\n";
$output .= "use AndrewGos\\TelegramBot\\ValueObject\\Phone;\n";
$output .= "use AndrewGos\\TelegramBot\\ValueObject\\Url;\n\n";

$output .= "class ApiDataProvider\n";
$output .= "{\n";
$output .= "    public static function generate(): array\n";
$output .= "    {\n";
$output .= "        \$rawToken = getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN');\n";
$output .= "        \$token = (\$rawToken === false || \$rawToken === 'YOUR_SECRET_API_KEY')\n";
$output .= "            ? '123456789:ABCDEF1234ghiklABCDEF1234ghiklABCDE'\n";
$output .= "            : \$rawToken;\n";
$output .= "        \$rawChatId = getenv('ANDREWGOS_TELEGRAM_BOT_TEST_CHAT_ID');\n";
$output .= "        \$chatId = (\$rawChatId === false || \$rawChatId === 'YOUR_SECRET_CHAT_ID') ? 123456789 : \$rawChatId;\n";
$output .= "        \$chatId = ctype_digit((string) \$chatId) ? (int) \$chatId : \$chatId;\n\n";
$output .= "        return [\n";
$output .= "            [\n";
$output .= "                'token' => new BotToken(\$token),\n";
$output .= "                'method' => 'sendMessage',\n";
$output .= "                'responseClass' => \\AndrewGos\\TelegramBot\\Response\\SendMessageResponse::class,\n";
$output .= "                'request' => new Request\\SendMessageRequest(\n";
$output .= "                    new ChatId(\$chatId),\n";
$output .= "                    'Hello World!',\n";
$output .= "                ),\n";
$output .= "            ],\n";
$output .= "        ];\n";
$output .= "    }\n\n";

$output .= "    public static function generateForUnit(): array\n";
$output .= "    {\n";
$output .= "        return [\n";

foreach ($entries as $entry) {
            $output .= "            [\n";
            $output .= "                '{$entry['method']}',\n";
            $output .= "                {$entry['requestExpr']},\n";
            $output .= "                \\{$entry['responseClass']}::class,\n";
            $output .= "                {$entry['resultExpr']},\n";
            $output .= "            ],\n";
}

$output .= "        ];\n";
$output .= "    }\n\n";

$output .= "    public static function generateFile(): array\n";
$output .= "    {\n";
$output .= "        \$rawToken = getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN');\n";
$output .= "        \$token = (\$rawToken === false || \$rawToken === 'YOUR_SECRET_API_KEY')\n";
$output .= "            ? '123456789:ABCDEF1234ghiklABCDEF1234ghiklABCDE'\n";
$output .= "            : \$rawToken;\n";
$output .= "        \$rawChatId = getenv('ANDREWGOS_TELEGRAM_BOT_TEST_CHAT_ID');\n";
$output .= "        \$chatId = (\$rawChatId === false || \$rawChatId === 'YOUR_SECRET_CHAT_ID') ? 123456789 : \$rawChatId;\n";
$output .= "        \$chatId = ctype_digit((string) \$chatId) ? (int) \$chatId : \$chatId;\n\n";
$output .= "        return [\n";
$output .= "            [\n";
$output .= "                'token' => new BotToken(\$token),\n";
$output .= "                'file' => '../files/.gitignore',\n";
$output .= "                'chatId' => new ChatId(\$chatId),\n";
$output .= "            ],\n";
$output .= "        ];\n";
$output .= "    }\n";
$output .= "}\n";

file_put_contents($outputFile, $output);
echo "Generated ApiDataProvider.php with " . count($entries) . " methods\n";
