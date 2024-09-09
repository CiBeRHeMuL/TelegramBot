<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

#[CanBeBuiltFromScalar]
readonly class IpV4
{
    private const IPV4_PART_REGEX = '(25[0-5]|2[0-4]\d|1?\d{1,2})';
    private const IPV4_MASK_REGEX = '\/(\d|[1-2]\d|3[0-2])';

    /**
     * @param string $address
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $address,
    ) {
        $regex = '/^' . self::IPV4_PART_REGEX . '(\.' . self::IPV4_PART_REGEX . '){3}(' . self::IPV4_MASK_REGEX . ')?$/ui';
        if (!preg_match($regex, $this->address)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid ip v4 representation');
        }
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
