<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

readonly class CallbackData
{
    /**
     * @param string $data
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $data,
    ) {
        if (strlen($this->data) < 1 || strlen($this->data) > 64) {
            throw new InvalidValueObjectConfigException(self::class, 'callback data length must be between 1 and 64');
        }
    }

    public function getData(): string
    {
        return $this->data;
    }
}
