<?php declare(strict_types=1);

use AndrewGos\TelegramBot\Request\RequestInterface;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/BaseFixtureGenerator.php';

$srcDir = __DIR__ . '/../src/Request';
$outputFile = __DIR__ . '/../tests/DataProvider/Request/RequestFixtures.php';
$classes = collectClassesByInterface($srcDir, 'AndrewGos\\TelegramBot\\Request', RequestInterface::class);

function resolveRequestType(ReflectionType $type, ReflectionParameter $param, string $paramName): ?string
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
                $args = createMinimalRequestEntityArgs($concrete);
                return ($args !== null && !empty($args))
                    ? "new \\{$concrete}(\n                " . implode(",\n                ", $args) . ",\n            )"
                    : "new \\{$concrete}()";
            }
            return 'null';
        }
        $args = createMinimalRequestEntityArgs($name);
        return ($args !== null && !empty($args))
            ? "new \\{$name}(\n                " . implode(",\n                ", $args) . ",\n            )"
            : "new \\{$name}()";
    }
    if (str_starts_with($name, 'AndrewGos\\TelegramBot\\')) {
        return 'null';
    }
    return 'null';
}

function createMinimalRequestEntityArgs(string $className): ?array
{
    $ref = new ReflectionClass($className);
    if ($ref->isAbstract() || $ref->isInterface()) {
        return null;
    }
    $constructor = $ref->getConstructor();
    if ($constructor === null) {
        return [];
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
        $resolved = resolveRequestType($type, $param, $paramName);
        if ($resolved !== null) {
            $args[] = "{$paramName}: {$resolved}";
        }
    }
    return empty($args) ? [] : $args;
}

$fixtures = [];
foreach ($classes as $class) {
    $ref = new ReflectionClass($class);
    $constructor = $ref->getConstructor();
    $shortName = $ref->getShortName();
    $fixtureParams = [];
    if ($constructor !== null) {
        foreach ($constructor->getParameters() as $param) {
            $paramName = $param->getName();
            if ($param->isOptional()) {
                continue;
            }
            $type = $param->getType();
            if ($type === null) {
                continue;
            }
            $resolved = resolveRequestType($type, $param, $paramName);
            if ($resolved !== null) {
                $fixtureParams[$paramName] = $resolved;
            }
        }
    }
    $fixtures[$shortName] = ['class' => $class, 'params' => $fixtureParams];
}

$output = generateOutputHeader(
    'AndrewGos\\TelegramBot\\Tests\\DataProvider\\Request',
    'RequestFixtures',
    'Provides fixture data for all Request classes.',
    'AndrewGos\\TelegramBot\\Request',
);
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
echo "Generated RequestFixtures.php with " . count($fixtures) . " requests\n";
