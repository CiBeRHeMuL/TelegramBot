<?php declare(strict_types=1);

use AndrewGos\TelegramBot\Entity\EntityInterface;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/BaseFixtureGenerator.php';

$srcDir = __DIR__ . '/../src/Entity';
$outputFile = __DIR__ . '/../tests/DataProvider/Entity/EntityFixtures.php';
$classes = collectClassesByInterface($srcDir, 'AndrewGos\\TelegramBot\\Entity', EntityInterface::class);

function resolveType(ReflectionType $type, ReflectionParameter $param, string $paramName): string
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
        return '__ENTITY__';
    }
    if (str_starts_with($name, 'AndrewGos\\TelegramBot\\')) {
        return 'null';
    }
    return 'null';
}

function createNestedEntityString(string $className, int $depth = 0): ?string
{
    if ($depth > 2) {
        return null;
    }
    $ref = new ReflectionClass($className);
    if ($ref->isAbstract() || $ref->isInterface()) {
        $concrete = findConcreteEntitySubclass($className);
        if ($concrete === null) {
            return null;
        }
        $className = $concrete;
        $ref = new ReflectionClass($className);
    }
    $constructor = $ref->getConstructor();
    if ($constructor === null) {
        return "new \\{$className}()";
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
        $resolved = resolveType($type, $param, $paramName);
        if ($resolved === '__ENTITY__') {
            $namedType = $type instanceof ReflectionNamedType ? $type : null;
            if ($namedType) {
                $inner = createNestedEntityString($namedType->getName(), $depth + 1);
                if ($inner !== null) {
                    $args[] = "{$paramName}: {$inner}";
                }
            }
        } elseif ($resolved !== null) {
            $args[] = "{$paramName}: {$resolved}";
        }
    }
    if (empty($args)) {
        return "new \\{$className}()";
    }
    return "new \\{$className}(\n                " . implode(",\n                ", $args) . ",\n            )";
}

$fixtures = [];
foreach ($classes as $class) {
    $ref = new ReflectionClass($class);
    $constructor = $ref->getConstructor();
    $shortName = $ref->getShortName();
    $params = $constructor !== null ? $constructor->getParameters() : [];
    $fixtureParams = [];
    foreach ($params as $param) {
        $paramName = $param->getName();
        if ($param->isOptional()) {
            continue;
        }
        $type = $param->getType();
        if ($type === null) {
            continue;
        }
        $resolved = resolveType($type, $param, $paramName);
        if ($resolved === '__ENTITY__') {
            $namedType = $type instanceof ReflectionNamedType ? $type : null;
            if ($namedType) {
                $inner = createNestedEntityString($namedType->getName(), 0);
                if ($inner !== null) {
                    $fixtureParams[$paramName] = $inner;
                }
            }
        } elseif ($resolved !== null) {
            $fixtureParams[$paramName] = $resolved;
        }
    }
    if (!empty($fixtureParams)) {
        $fixtures[$shortName] = ['class' => $class, 'params' => $fixtureParams];
    }
}

$output = generateOutputHeader(
    'AndrewGos\\TelegramBot\\Tests\\DataProvider\\Entity',
    'EntityFixtures',
    'Provides fixture data for all ~333 concrete Entity classes.',
    'AndrewGos\\TelegramBot\\Entity',
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
echo "Generated EntityFixtures.php with " . count($fixtures) . " entities\n";
