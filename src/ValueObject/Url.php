<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует URL через FILTER_VALIDATE_URL.
 *
 * @sees USES_API(X): PHP filter_var
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Url, Telegram, URL, validation, filter
// STRUCTURE: ▶ ┌url┐ → ○ filter_var(FILTER_VALIDATE_URL) → ◇ valid ? ✓ store : ✗ throw InvalidValueObjectConfigException → ∑ getUrl()
// region CLASS_Url
#[CanBeBuiltFromScalar]
readonly class Url
{
    /**
     * @param string $url
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $url,
    ) {
        if (!filter_var($this->url, FILTER_VALIDATE_URL)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid url representation');
        }
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}
// endregion CLASS_Url
