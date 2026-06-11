<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует номер телефона по регулярному выражению (формат E.164).
 *
 * @sees USES_API(X): PHP preg_match
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Phone, Telegram, phone, number, E164, validation
// STRUCTURE: ▶ ┌phone┐ → ○ preg_match(E164_REGEX) → ◇ valid ? ✓ store : ✗ throw InvalidValueObjectConfigException → ∑ getPhone()
// region CLASS_Phone
#[CanBeBuiltFromScalar]
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
// endregion CLASS_Phone
