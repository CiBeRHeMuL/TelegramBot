<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует callback data строку (макс. 64 байта).
 *
 * @sees USES_API(X): Telegram Bot API — CallbackData
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: CallbackData, Telegram, callback, data, validation
// STRUCTURE: ▶ ┌data┐ → ○ strlen(data) ∈ [1..64] → ◇ valid ? ✓ store : ✗ throw InvalidValueObjectConfigException → ∑ getData()
// region CLASS_CallbackData
#[CanBeBuiltFromScalar]
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
// endregion CLASS_CallbackData
