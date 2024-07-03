<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

#[CanBeBuiltFromScalar]
readonly class IpV6
{
    /**
     * @param string $address
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $address,
    ) {
        $regex = '/^(([0-9a-fA-F]{1,4}:){7}([0-9a-fA-F]{1,4}|:)|(([0-9a-fA-F]{1,4}:){1,6}|:):([0-9a-fA-F]{1,4}|:){1,6})$/ui';
        if (!preg_match($regex, $this->address)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid ip v6 representation');
        }
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
