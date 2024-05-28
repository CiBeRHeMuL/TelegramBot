<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

readonly class IpV4
{
    private const IPV4_PART_REGEX = '(25[0-5]|2[0-4]\d|1?\d{1,2})';

    /**
     * @param string $address
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $address,
    ) {
        $regex = '/^' . self::IPV4_PART_REGEX . '(\.' . self::IPV4_PART_REGEX . '){3}$/ui';
        if (!preg_match($regex, $this->address)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid ip v4 representation');
        }
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
