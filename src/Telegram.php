<?php

namespace AndrewGos\TelegramBot;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\User;
use AndrewGos\TelegramBot\Kernel\UpdateHandlerInterface;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;

// region MODULE_CONTRACT [DOMAIN(10): Telegram Bot; CONCEPT(10): Facade; TECH(8): DI]
/**
 * @moduleContract
 * @purpose Provide the main library facade — aggregate Api + UpdateHandler into a single entry point for bot operations.
 * @scope Version info, bot info (getMe), token validation, API/UpdateHandler wiring.
 * @input BotToken, ApiInterface, UpdateHandlerInterface
 * @output Consolidated bot interface with token consistency enforcement
 *
 * @sees USES_API(9): ApiInterface, UpdateHandlerInterface; READS_DATA_FROM(8): BotToken
 *
 * @invariants
 * - Api and bot must share the same token (enforced in setApi)
 * - getMe() caches the result after first call
 *
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, facade, bot, API, update handler, token, version, getMe
// STRUCTURE: ▶ ┌token + api + updateHandler┐ → ◇ setApi() validates token match → ⊕ getMe(): lazy-load User via api → ∑ getVersion()

// region CLASS_Telegram [DOMAIN(10): Telegram Bot; CONCEPT(10): Facade]
class Telegram
{
    /**
     * Library version.
     */
    private const VERSION = '4.6';

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

    // region METHOD_getMe [DOMAIN(9): Telegram Bot; CONCEPT(8): LazyLoad]
    /**
     * @purpose Retrieve the bot's own User object, lazily cached after first API call.
     *
     * @using ApiInterface::getMe()
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
        return static::VERSION;
    }

    public function setLogger(LoggerInterface $logger): static
    {
        $this->api->setLogger($logger);
        $this->updateHandler->setLogger($logger);

        return $this;
    }
}
// endregion CLASS_Telegram
