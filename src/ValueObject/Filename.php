<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region CLASS_Filename
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
// endregion CLASS_Filename
