<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует имя файла через file_exists.
 *
 * @sees USES_API(X): PHP file_exists
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Filename, Telegram, file, name, validation
// STRUCTURE: ▶ ┌filename┐ → ○ file_exists(filename) → ◇ exists ? ✓ store : ✗ throw InvalidValueObjectConfigException → ∑ getFilename()
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
