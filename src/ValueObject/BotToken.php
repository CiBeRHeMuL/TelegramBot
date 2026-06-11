<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует токен бота Telegram по регулярному выражению.
 *
 * @sees USES_API(X): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotToken, Telegram, bot token, validation, regex
// STRUCTURE: ▶ ┌token┐ → ○ preg_match(TOKEN_REGEX) → ◇ match ? ✓ store : ✗ throw InvalidValueObjectConfigException → ∑ getToken()
// region CLASS_BotToken
/**
 * Класс для хранения токена бота Telegram.
 */
readonly class BotToken
{
    private const TOKEN_REGEX = '/^\d{8,10}:[\w-]{35}$/ui';

    private string $token;

    /**
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        string $token,
    ) {
        if (!preg_match(self::TOKEN_REGEX, $token)) {
            throw new InvalidValueObjectConfigException(
                self::class,
                'token must match "'
                . self::TOKEN_REGEX
                . '" regex.',
            );
        }
        $this->token = $token;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
// endregion CLASS_BotToken
