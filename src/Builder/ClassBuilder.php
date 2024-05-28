<?php

namespace AndrewGos\TelegramBot\Builder;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Attribute\AvailableExtensions;
use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\Exception\InvalidClassConfigException;
use AndrewGos\TelegramBot\Exception\InvalidClassException;
use BackedEnum;
use InvalidArgumentException;
use ReflectionClass;
use ReflectionException;
use Throwable;
use UnitEnum;

class ClassBuilder implements ClassBuilderInterface
{
    /**
     * @inheritDoc
     */
    public function build(string $class, mixed $data): object
    {
        if (class_exists($class)) {
            $reflection = new ReflectionClass($class);
            if ($reflection->isAbstract()) {
                $extensions = $reflection->getAttributes(AvailableExtensions::class);
                $extensionTypes = $extensions[0]?->newInstance()?->getExtensions();
                if (!$extensions || !$extensionTypes) {
                    throw new InvalidArgumentException("Cannot build abstract class '$class' without extensions");
                } else {
                    return $this->buildParameter($class, $data);
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
                                if ($allowDefaultValue && !array_key_exists($name, $data)) {
                                    $boundParameters[$name] = $defaultValue;
                                } else {
                                    $boundParameters[$name] = $this->buildArrayParameter($attribute, $data[$name]);
                                }
                            } else {
                                $boundParameters[$name] = $this->buildParameter((string)$type, $data[$name] ?? $defaultValue);
                            }
                        } else {
                            $boundParameters[$name] = $this->buildParameter((string)$type, $data[$name] ?? $defaultValue);
                        }
                    }
                    return new $class(...$boundParameters);
                } catch (Throwable $e) {
                    throw new InvalidClassConfigException($class);
                }
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
                $result[$key] = $this->build($class, $value);
            }
            return $result;
        }
        throw new InvalidClassException($class);
    }

    /**
     * @param ArrayType $type
     * @param array $data
     *
     * @return array
     * @throws InvalidClassException
     * @throws InvalidClassConfigException
     * @throws ReflectionException
     */
    private function buildArrayParameter(ArrayType $type, array $data): array
    {
        $result = [];
        $elementType = $type->getType();
        foreach ($data as $k => $row) {
            if ($elementType instanceof ArrayType) {
                $result[$k] = $this->buildArrayParameter($elementType, $row);
            } else {
                $result[$k] = $this->buildParameter($elementType, $row);
            }
        }
        return $result;
    }

    /**
     * @param string $type
     * @param mixed $data
     *
     * @return mixed
     */
    private function buildParameter(string $type, mixed $data): mixed
    {
        if (str_starts_with($type, '?')) {
            $type = str_replace('?', '', $type);
            $type = $type . '|null';
        }
        $types = explode('|', $type);
        $result = $data;
        foreach ($types as $possibleType) {
            if (is_subclass_of($possibleType, BackedEnum::class)) {
                return $possibleType::tryFrom($data);
            } elseif (is_subclass_of($possibleType, UnitEnum::class)) {
                return $possibleType::$$data;
            } elseif (class_exists($possibleType)) {
                $reflection = new ReflectionClass($possibleType);
                $availableExtensionsAttributes = $reflection->getAttributes(AvailableExtensions::class);
                if ($availableExtensionsAttributes) {
                    /** @var AvailableExtensions $availableExtensionsAttribute */
                    $availableExtensionsAttribute = $availableExtensionsAttributes[0]->newInstance();
                    if ($availableExtensionsAttribute->getExtensions()) {
                        return $this->buildParameter(implode('|', $availableExtensionsAttribute->getExtensions()), $data);
                    } else {
                        throw new InvalidArgumentException('Available extensions not set do not exist');
                    }
                } else {
                    $attributes = $reflection->getAttributes(BuildIf::class);
                    /** @var BuildIf $buildIf */
                    $buildIf = ($attributes[0] ?? null)?->newInstance();
                    try {
                        if ($buildIf === null || $buildIf->getChecker()->check($data)) {
                            return $this->build($possibleType, $data);
                        }
                    } catch (Throwable) {
                        continue;
                    }
                }
            }
        }
        return $result;
    }
}
