<?php declare(strict_types=1);

use AndrewGos\TelegramBot\Response\ResponseInterface;
use AndrewGos\TelegramBot\Response\RawResponse;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/BaseFixtureGenerator.php';

$srcDir = __DIR__ . '/../src/Response';
$outputFile = __DIR__ . '/../tests/DataProvider/Response/ResponseFixtures.php';
$classes = collectClassesByInterface($srcDir, 'AndrewGos\\TelegramBot\\Response', ResponseInterface::class);

$classes = array_filter($classes, fn(string $c) => $c !== RawResponse::class);

function resolveResponseType(ReflectionType $type, ReflectionParameter $param, string $paramName): ?string
{
    $type = flattenUnion($type);
    if (!$type instanceof ReflectionNamedType) {
        return 'null';
    }
    $name = $type->getName();
    if ($name === 'AndrewGos\\TelegramBot\\Response\\RawResponse') {
        return 'new RawResponse(true, result: true)';
    }
    $common = resolveCommonType($type, $paramName);
    if ($common !== null) {
        return $common;
    }
    if (str_starts_with($name, 'AndrewGos\\TelegramBot\\')) {
        return 'null';
    }
    return 'null';
}

$fixtures = [];
foreach ($classes as $class) {
    $ref = new ReflectionClass($class);
    $constructor = $ref->getConstructor();
    $shortName = $ref->getShortName();
    $fixtureParams = [];
    $hasRawResponse = false;
    if ($constructor !== null) {
        foreach ($constructor->getParameters() as $param) {
            $paramName = $param->getName();
            $type = $param->getType();
            if ($type instanceof ReflectionNamedType && $type->getName() === 'AndrewGos\\TelegramBot\\Response\\RawResponse') {
                $fixtureParams[$paramName] = 'new RawResponse(true, result: true)';
                $hasRawResponse = true;
            } elseif (!$param->isOptional()) {
                $resolved = $type !== null ? resolveResponseType($type, $param, $paramName) : null;
                if ($resolved !== null) {
                    $fixtureParams[$paramName] = $resolved;
                }
            }
        }
    }
    if (!$hasRawResponse) {
        $fixtureParams = array_merge(['response' => 'new RawResponse(true, result: true)'], $fixtureParams);
    }
    $fixtures[$shortName] = ['class' => $class, 'params' => $fixtureParams];
}

$output = generateOutputHeader(
    'AndrewGos\\TelegramBot\\Tests\\DataProvider\\Response',
    'ResponseFixtures',
    'Provides fixture data for all Response classes.',
    'AndrewGos\\TelegramBot\\Response',
);
$output = str_replace('use Generator;', "use AndrewGos\\TelegramBot\\Response\\RawResponse;\nuse Generator;", $output);
foreach ($fixtures as $shortName => $fixture) {
    $class = $fixture['class'];
    $params = $fixture['params'];
    $output .= "        yield '{$shortName}' => [\\{$class}::class, [\n";
    foreach ($params as $name => $value) {
        $output .= "            '{$name}' => {$value},\n";
    }
    $output .= "        ]];\n";
}
$output .= "    }\n}\n";

file_put_contents($outputFile, $output);
echo "Generated ResponseFixtures.php with " . count($fixtures) . " responses\n";
