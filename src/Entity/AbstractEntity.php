<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use ReflectionClass;
use Throwable;
use UnexpectedValueException;

/**
 * This class allow all entities to check array elements type
 */
abstract class AbstractEntity implements EntityInterface
{
    public function __construct()
    {
        $reflection = new ReflectionClass(static::class);
        foreach ($reflection->getProperties() as $property) {
            $propertyName = $property->getName();
            $value = $property->getValue($this);
            if (is_array($value)) {
                $attributes = $property->getAttributes(ArrayType::class);
                if ($attributes) {
                    $arrayType = reset($attributes)->newInstance();
                    $this->checkArrayType($value, $arrayType, $propertyName);
                }
            }
        }
    }

    /**
     * Checks, that each array element has type $type
     *
     * @param array $array
     * @param ArrayType $type
     * @param string $propertyName
     *
     * @return void
     */
    protected function checkArrayType(array $array, ArrayType $type, string $propertyName): void
    {
        try {
            $elementType = $type->getType();
            if ($elementType instanceof ArrayType) {
                foreach ($array as $k => $item) {
                    $this->checkArrayType($item, $elementType, "{$propertyName}[$k]");
                }
            } else {
                $types = explode('|', $elementType);
                foreach ($array as $item) {
                    foreach ($types as $possibleType) {
                        if (
                            (in_array($possibleType, ['int', 'integer']) && is_int($item))
                            || (in_array($possibleType, ['float', 'double']) && is_float($item))
                            || ($possibleType === 'string' && is_string($item))
                            || (in_array($possibleType, ['bool', 'boolean']) && is_bool($item))
                            || ($possibleType === 'null' && is_null($item))
                            || ($possibleType === 'array' && is_array($item))
                            || is_a($item, $possibleType, true)
                        ) {
                            break 2;
                        }
                    }
                    throw new UnexpectedValueException(
                        "Each element in '"
                        . static::class . "::$propertyName' must be of type '$elementType'",
                    );
                }
            }
        } catch (Throwable $e) {
            if ($e instanceof UnexpectedValueException) {
                throw $e;
            }
            throw new UnexpectedValueException(
                "Failed to check element of '" . static::class . "::$propertyName'",
            );
        }
    }
}
