<?php declare(strict_types=1);

use AndrewGos\TelegramBot\ValueObject\BotToken;
use AndrewGos\TelegramBot\ValueObject\CallbackData;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Email;
use AndrewGos\TelegramBot\ValueObject\EncodedJson;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\IpV4;
use AndrewGos\TelegramBot\ValueObject\IpV6;
use AndrewGos\TelegramBot\ValueObject\Language;
use AndrewGos\TelegramBot\ValueObject\Phone;
use AndrewGos\TelegramBot\ValueObject\Url;

const VALUE_OBJECT_MAP = [
    'BotToken' => 'new BotToken(\'123456789:ABCDEF1234ghiklABCDEF1234ghiklABCDE\')',
    'ChatId' => 'new ChatId(123456789)',
    'Url' => 'new Url(\'https://example.com\')',
    'Email' => 'new Email(\'test@example.com\')',
    'EncodedJson' => 'new EncodedJson(\'{"key":"value"}\')',
    'Phone' => 'new Phone(\'+12345678901\')',
    'CallbackData' => 'new CallbackData(\'test_callback\')',
    'IpV4' => 'new IpV4(\'192.168.1.1\')',
    'IpV6' => 'new IpV6(\'::1\')',
    'Language' => 'new Language(\'en\')',
    'Filename' => 'new Filename(__FILE__)',
];

function pushSimpleTypeFirst(array $nonNull): ReflectionType
{
    $first = $nonNull[array_key_first($nonNull)];
    foreach ($nonNull as $t) {
        if ($t instanceof ReflectionNamedType && $t->isBuiltin() && in_array($t->getName(), ['string', 'int', 'bool', 'float', 'array'], true)) {
            return $t;
        }
    }
    return $first;
}

function flattenUnion(ReflectionType $type): ReflectionType
{
    if ($type instanceof ReflectionUnionType || $type instanceof ReflectionIntersectionType) {
        $types = $type instanceof ReflectionUnionType ? $type->getTypes() : $type->getTypes();
        $nonNull = array_filter($types, fn(ReflectionType $t) => !$t->allowsNull());
        if (empty($nonNull)) {
            return $types[0];
        }
        return pushSimpleTypeFirst($nonNull);
    }
    return $type;
}

function resolveBuiltin(ReflectionNamedType $type, string $paramName): ?string
{
    return match ($type->getName()) {
        'int' => '123456789',
        'string' => "'test_{$paramName}'",
        'bool' => 'true',
        'float' => '1.5',
        'array' => '[]',
        default => null,
    };
}

function resolveEnum(ReflectionNamedType $type): ?string
{
    $name = $type->getName();
    if (enum_exists($name)) {
        $cases = $name::cases();
        if (!empty($cases)) {
            return "\\{$name}::{$cases[0]->name}";
        }
    }
    return null;
}

function resolveValueObject(ReflectionNamedType $type): ?string
{
    $name = $type->getName();
    if (!str_starts_with($name, 'AndrewGos\\TelegramBot\\ValueObject\\')) {
        return null;
    }
    $short = substr($name, strrpos($name, '\\') + 1);
    return VALUE_OBJECT_MAP[$short] ?? null;
}

function collectClassesByInterface(string $srcDir, string $namespace, string $interface): array
{
    $classes = [];
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($srcDir, RecursiveDirectoryIterator::SKIP_DOTS));
    foreach ($files as $file) {
        if ($file->getExtension() !== 'php') {
            continue;
        }
        $basename = $file->getBasename('.php');
        if (str_starts_with($basename, 'Abstract') || str_contains($basename, 'Interface') || $basename === '_module_contract') {
            continue;
        }
        $fullClass = $namespace . '\\' . $basename;
        if (!class_exists($fullClass) || !is_subclass_of($fullClass, $interface)) {
            continue;
        }
        $ref = new ReflectionClass($fullClass);
        if ($ref->isAbstract() || $ref->isInterface()) {
            continue;
        }
        $classes[] = $fullClass;
    }
    sort($classes);
    return $classes;
}

function findConcreteEntitySubclass(string $abstractClass): ?string
{
    return findConcreteSubclassInDir($abstractClass, __DIR__ . '/../src/Entity', 'AndrewGos\\TelegramBot\\Entity');
}

function findConcreteSubclassInDir(string $abstractClass, string $dir, string $namespace): ?string
{
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS));
    foreach ($files as $file) {
        if ($file->getExtension() !== 'php') {
            continue;
        }
        $basename = $file->getBasename('.php');
        if (str_starts_with($basename, 'Abstract') || str_contains($basename, 'Interface') || $basename === '_module_contract') {
            continue;
        }
        $fullClass = $namespace . '\\' . $basename;
        if (!class_exists($fullClass)) {
            continue;
        }
        $ref = new ReflectionClass($fullClass);
        if ($ref->isAbstract() || $ref->isInterface()) {
            continue;
        }
        if ($ref->isSubclassOf($abstractClass)) {
            return $fullClass;
        }
    }
    return null;
}

function resolveCommonType(ReflectionNamedType $type, string $paramName): ?string
{
    if ($type->isBuiltin()) {
        return resolveBuiltin($type, $paramName);
    }
    $enum = resolveEnum($type);
    if ($enum !== null) {
        return $enum;
    }
    return resolveValueObject($type);
}

function generateOutputHeader(string $namespace, string $className, string $description, string $srcNamespaceUse): string
{
    $output = "<?php\n\ndeclare(strict_types=1);\n\nnamespace {$namespace};\n\n";
    $output .= "use {$srcNamespaceUse};\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\BotToken;\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\CallbackData;\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\ChatId;\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\Email;\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\EncodedJson;\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\Filename;\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\IpV4;\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\IpV6;\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\Language;\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\Phone;\n";
    $output .= "use AndrewGos\\TelegramBot\\ValueObject\\Url;\n";
    $output .= "use Generator;\n\n";
    $output .= "/**\n";
    $output .= " * @moduleContract\n";
    $output .= " * @purpose AUTO-GENERATED. {$description}\n";
    $output .= " * @changes LAST_CHANGE: Auto-generated\n";
    $output .= " */\n";
    $output .= "class {$className}\n";
    $output .= "{\n";
    $output .= "    public static function all(): Generator\n";
    $output .= "    {\n";
    return $output;
}
