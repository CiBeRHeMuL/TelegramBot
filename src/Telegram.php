<?php

namespace AndrewGos\TelegramBot;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\User;
use AndrewGos\TelegramBot\Kernel\UpdateHandlerInterface;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;

// region CLASS_Telegram
class Telegram
{
    /**
     * Library version.
     */
    private const VERSION = '4.7';

    private User $me;

    public function __construct(
        private readonly BotToken $token,
        private ApiInterface $api,
        private UpdateHandlerInterface $updateHandler,
    ) {
        $this->setApi($this->api);
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

    public function setApi(ApiInterface $api): void
    {
        if ($this->token->getToken() !== $this->api->getToken()->getToken()) {
            throw new InvalidArgumentException('Api and bot must have same tokens');
        }
        $this->api = $api;
        $this->updateHandler->setApi($this->api);
    }

    public function setUpdateHandler(UpdateHandlerInterface $updateHandler): void
    {
        $this->updateHandler = $updateHandler;
    }

    // region METHOD_getMe
    /**
     * Retrieve the bot's own User object, lazily cached after first API call.
     *
     * @return User
     *
     * @throws InvalidArgumentException If the token is invalid and bot is not found
     */
    public function getMe(): User
    {
        try {
            $this->me ??= $this->api->getMe()->getUser();
        } catch (Throwable) {
            throw new InvalidArgumentException('Invalid token! Bot not found');
        }

        return $this->me;
    }
    // endregion METHOD_getMe

    public function getVersion(): string
    {
        return self::VERSION;
    }

    public function setLogger(LoggerInterface $logger): static
    {
        $this->api->setLogger($logger);
        $this->updateHandler->setLogger($logger);

        return $this;
    }
}
// endregion CLASS_Telegram
