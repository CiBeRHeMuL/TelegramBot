<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

#[CanBeBuiltFromScalar]
readonly class Filename
{
    /**
     * @param string $filename
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $filename,
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
