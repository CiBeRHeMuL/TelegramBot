<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

readonly class Filename
{
    public function __construct(
        private string $filename
    ) {
        if (!file_exists($this->filename)) {
            throw new InvalidValueObjectConfigException(self::class, 'Invalid filename');
        }
    }

    public function getFilename(): string
    {
        return $this->filename;
    }
}
