<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

#[CanBeBuiltFromScalar]
readonly class Email
{
    /**
     * @param string $email
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $email,
    ) {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid email representation');
        }
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
