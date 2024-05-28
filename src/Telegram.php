<?php

namespace AndrewGos\TelegramBot;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Client\ClientInterface;
use AndrewGos\TelegramBot\Entity\User;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use InvalidArgumentException;
use Throwable;

class Telegram
{
    /**
     * Library version
     */
    private const VERSION = '1.0.0';

    private User $me;

    public function __construct(
        private readonly BotToken $token,
        private readonly ApiInterface $api,
        private readonly ClientInterface $client,
    ) {
        if ($this->token->getToken() !== $this->api->getToken()->getToken()) {
            throw new InvalidArgumentException('Api and bot must have same tokens');
        }
        try {
            $this->me = $this->api->getMe()->getUser();
        } catch (Throwable $e) {
            throw new InvalidArgumentException('Invalid token! Bot not found');
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

    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    public function getMe(): User
    {
        return $this->me;
    }

    public function getVersion(): string
    {
        return static::VERSION;
    }
}
