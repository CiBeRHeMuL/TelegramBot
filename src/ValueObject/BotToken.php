<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

/**
 * Класс для хранения токена бота Telegram
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
