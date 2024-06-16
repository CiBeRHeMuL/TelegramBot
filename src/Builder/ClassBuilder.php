<?php

namespace AndrewGos\TelegramBot\Builder;

use AndrewGos\TelegramBot\Builder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Builder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Builder\Attribute\BuildIf;
use AndrewGos\TelegramBot\Exception\ClassBuilder\InvalidClassException;
use AndrewGos\TelegramBot\Exception\ClassBuilder\InvalidDataException;
use BackedEnum;
use InvalidArgumentException;
use ReflectionClass;
use Throwable;
use UnitEnum;

class ClassBuilder implements ClassBuilderInterface
{
    /**
     * @inheritDoc
     */
    public function build(string $class, mixed $data, string $parameterName = ''): object
    {
        if (class_exists($class)) {
            $parameterName = $parameterName ?: $class;
            $reflection = new ReflectionClass($class);
            if ($reflection->isAbstract()) {
                $extensions = $reflection->getAttributes(AvailableInheritors::class);
                $extensionTypes = $extensions[0]?->newInstance()?->getExtensions();
                if (!$extensions || !$extensionTypes) {
                    throw new InvalidArgumentException("Cannot build abstract class '$class' without inheritors");
                } else {
                    return $this->buildParameter($parameterName, $class, $data);
                }
            }
            $constructorParameters = $reflection->getConstructor()->getParameters();
            if ($constructorParameters === []) {
                return new $class();
            } elseif (count($constructorParameters) === 1) {
                if (is_array($data) && (count($data) > 1 || !isset($data[$constructorParameters[0]->getName()]))) {
                    $data = [$constructorParameters[0]->getName() => $data];
                } else {
                    return new $class($data);
                }
            }
            if (is_array($data)) {
                $boundParameters = [];
                try {
                    foreach ($constructorParameters as $parameter) {
                        $name = $parameter->getName();
                        $type = $parameter->getType();
                        $allowDefaultValue = $parameter->isDefaultValueAvailable()
                            || $parameter->allowsNull()
                            || $type?->allowsNull();
                        $defaultValue = $allowDefaultValue
                            ? (
                            $parameter->isDefaultValueAvailable()
                                ? $parameter->getDefaultValue()
                                : null
                            )
                            : null;
                        if ($type === null) {
                            $boundParameters[$name] = $data[$name] ?? $defaultValue;
                        } elseif (in_array((string)$type, ['array', '?array'], true)) {
                            $attributes = $parameter->getAttributes(ArrayType::class);
                            if ($attributes) {
                                /** @var ArrayType $attribute */
                                $attribute = $attributes[0]->newInstance();
                                if (
                                    $allowDefaultValue
                                    && (!array_key_exists($name, $data) || $data[$name] === $defaultValue)
                                ) {
                                    $boundParameters[$name] = $defaultValue;
                                } elseif (array_key_exists($name, $data) && is_array($data[$name])) {
                                    $boundParameters[$name] = $this->buildArrayParameter(
                                        "$parameterName::$name",
                                        $attribute,
                                        $data[$name],
                                    );
                                } else {
                                    throw $this->invalidData(
                                        $this->cannotBuildFromData($type, get_debug_type($data[$name] ?? null)),
                                        "$parameterName::$name",
                                    );
                                }
                            } else {
                                $boundParameters[$name] = $this->buildParameter(
                                    "$parameterName::$name",
                                    (string)$type,
                                    $data[$name] ?? $defaultValue,
                                );
                            }
                        } else {
                            $boundParameters[$name] = $this->buildParameter(
                                "$parameterName::$name",
                                (string)$type,
                                $data[$name] ?? $defaultValue,
                            );
                        }
                    }
                    return new $class(...$boundParameters);
                } catch (Throwable $e) {
                    if ($e instanceof InvalidDataException) {
                        throw $e;
                    }
                    throw $this->invalidData(
                        $e->getMessage(),
                        $class,
                    );
                }
            } else {
                throw $this->invalidData(
                    $this->cannotBuildFromData($class, get_debug_type($data)),
                    $class,
                );
            }
        }
        throw new InvalidClassException($class);
    }

    /**
     * @inheritDoc
     */
    public function buildArray(string $class, array $data): array
    {
        if (class_exists($class)) {
            $result = [];
            foreach ($data as $key => $value) {
                $result[$key] = $this->build($class, $value, "[$key]");
            }
            return $result;
        }
        throw new InvalidClassException($class);
    }

    /**
     * @param string $parameterName
     * @param ArrayType $type
     * @param array $data
     *
     * @return array
     * @throws InvalidDataException
     */
    private function buildArrayParameter(string $parameterName, ArrayType $type, array $data): array
    {
        $result = [];
        $elementType = $type->getType();
        foreach ($data as $k => $row) {
            if ($elementType instanceof ArrayType) {
                $result[$k] = $this->buildArrayParameter(
                    "{$parameterName}[$k]",
                    $elementType,
                    $row,
                );
            } else {
                $result[$k] = $this->buildParameter(
                    "{$parameterName}[$k]",
                    $elementType,
                    $row,
                );
            }
        }
        return $result;
    }

    /**
     * @param string $parameterName
     * @param string $type
     * @param mixed $data
     *
     * @return mixed
     * @throws InvalidDataException
     */
    private function buildParameter(string $parameterName, string $type, mixed $data): mixed
    {
        if (str_starts_with($type, '?')) {
            $type = str_replace('?', '', $type);
            $type = $type . '|null';
        }
        $types = explode('|', $type);
        $notBuiltReason = 'invalid data';
        $previouslyThrownInvalidData = false;
        foreach ($types as $possibleType) {
            if (is_subclass_of($possibleType, BackedEnum::class)) {
                try {
                    if (!is_string($data) && !is_int($data)) {
                        $notBuiltReason = "cannot get value from enum '$possibleType' with non-string and non-int scalar equivalent";
                        continue;
                    }
                    return $possibleType::from($data);
                } catch (Throwable $e) {
                    $notBuiltReason = "enum '$possibleType' does not have value with scalar equivalent '$data'";
                }
            } elseif (is_subclass_of($possibleType, UnitEnum::class)) {
                try {
                    if (!is_string($data)) {
                        $notBuiltReason = "cannot get value from enum '$possibleType' with non-string name";
                        continue;
                    }
                    return $possibleType::$$data;
                } catch (Throwable $e) {
                    $notBuiltReason = "enum '$possibleType' does not have value '$data'";
                }
            } elseif (class_exists($possibleType)) {
                $reflection = new ReflectionClass($possibleType);
                $availableExtensionsAttributes = $reflection->getAttributes(AvailableInheritors::class);
                if ($availableExtensionsAttributes) {
                    /** @var AvailableInheritors $availableExtensionsAttribute */
                    $availableExtensionsAttribute = $availableExtensionsAttributes[0]->newInstance();
                    if ($availableExtensionsAttribute->getInheritors()) {
                        try {
                            return $this->buildParameter(
                                $parameterName,
                                implode('|', $availableExtensionsAttribute->getInheritors()),
                                $data,
                            );
                        } catch (Throwable $e) {
                            $notBuiltReason = $e->getMessage();
                            $previouslyThrownInvalidData = $e instanceof InvalidDataException;
                            continue;
                        }
                    } else {
                        $notBuiltReason = 'available inheritors not set or not exist';
                        continue;
                    }
                } else {
                    $attributes = $reflection->getAttributes(BuildIf::class);
                    /** @var BuildIf $buildIf */
                    $buildIf = ($attributes[0] ?? null)?->newInstance();
                    try {
                        if ($buildIf === null || $buildIf->getChecker()->check($data)) {
                            return $this->build($possibleType, $data, $parameterName);
                        } else {
                            $notBuiltReason = "cannot build value of type '$possibleType' because buildIf check failed";
                        }
                    } catch (Throwable $e) {
                        $notBuiltReason = $e->getMessage();
                        $previouslyThrownInvalidData = $e instanceof InvalidDataException;
                        continue;
                    }
                }
            } elseif (
                in_array(
                    $possibleType,
                    ['int', 'integer', 'float', 'double', 'string', 'bool', 'boolean', 'null', 'array'],
                )
            ) {
                if (is_scalar($data) || is_null($data) || is_array($data)) {
                    if (
                        (in_array($possibleType, ['int', 'integer']) && is_int($data))
                        || (in_array($possibleType, ['float', 'double']) && is_float($data))
                        || ($possibleType === 'string' && is_string($data))
                        || (in_array($possibleType, ['bool', 'boolean']) && is_bool($data))
                        || ($possibleType === 'null' && is_null($data))
                        || ($possibleType === 'array' && is_array($data))
                    ) {
                        return $data;
                    }
                }
                if ($possibleType !== 'null') {
                    $notBuiltReason = $this->cannotBuildFromData($possibleType, get_debug_type($data));
                }
                continue;
            } else {
                $notBuiltReason = "cannot build unknown type '$possibleType'";
            }
        }
        throw $this->invalidData(
            $notBuiltReason,
            $parameterName,
            $previouslyThrownInvalidData,
        );
    }

    private function cannotBuildFromData(string $type, string $dataType): string
    {
        return "cannot build value of type '$type' from value of type '$dataType'";
    }

    private function invalidData(string $exception, string $parameterName = '', bool $previouslyThrown = false): InvalidDataException
    {
        return new InvalidDataException(
            $previouslyThrown
                ? $exception
                : "Cannot build parameter '$parameterName' because of reason: $exception",
        );
    }
}
