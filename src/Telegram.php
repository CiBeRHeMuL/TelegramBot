<?php

namespace AndrewGos\TelegramBot;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\UpdateHandler\UpdateHandlerInterface;
use AndrewGos\TelegramBot\Entity\User;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use InvalidArgumentException;
use Throwable;

class Telegram
{
    /**
     * Library version
     */
    private const VERSION = '1.0.1';

    private User $me;

    public function __construct(
        private readonly BotToken $token,
        private readonly ApiInterface $api,
        private readonly UpdateHandlerInterface $updateHandler,
    ) {
        if ($this->token->getToken() !== $this->api->getToken()->getToken()) {
            throw new InvalidArgumentException('Api and bot must have same tokens');
        }
    }

    public function getToken(): BotToken
    {
        return $this->token;
    }

    public function getApi(): ApiInterface
    {
        return $this->api;
    }

    public function getUpdateHandler(): UpdateHandlerInterface
    {
        return $this->updateHandler;
    }

    public function getMe(): User
    {
        try {
            $this->me ??= $this->api->getMe()->getUser();
        } catch (Throwable $e) {
            throw new InvalidArgumentException('Invalid token! Bot not found');
        }
        return $this->me;
    }

    public function getVersion(): string
    {
        return static::VERSION;
    }
}
