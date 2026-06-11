<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует email-адрес через FILTER_VALIDATE_EMAIL.
 *
 * @sees USES_API(X): PHP filter_var
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Email, Telegram, email, validation, filter
// STRUCTURE: ▶ ┌email┐ → ○ filter_var(FILTER_VALIDATE_EMAIL) → ◇ valid ? ✓ store : ✗ throw InvalidValueObjectConfigException → ∑ getEmail()
// region CLASS_Email
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
// endregion CLASS_Email
