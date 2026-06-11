<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getManagedBotToken method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getmanagedbottoken
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, Managed, Bot, Token
// STRUCTURE: ▶ ┌user_id┐ → ◇ construct → ⊕ → ∑ ⟦GetManagedBotTokenRequest⟧

// region CLASS_GetManagedBotTokenRequest
/**
 * @see https://core.telegram.org/bots/api#getmanagedbottoken
 */
class GetManagedBotTokenRequest implements RequestInterface
{
    /**
     * @param int $user_id User identifier of the managed bot whose token will be returned
     */
    public function __construct(
        private int $user_id,
    ) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetManagedBotTokenRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_GetManagedBotTokenRequest
