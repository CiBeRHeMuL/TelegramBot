<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

readonly class Phone
{
    /**
     * @param string $phone
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $phone,
    ) {
        if (!preg_match('/^\+\d{1,4}\d{9,15}$/iu', $this->phone)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid phone representation');
        }
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
