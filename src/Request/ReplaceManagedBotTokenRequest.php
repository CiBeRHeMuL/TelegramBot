<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API replaceManagedBotToken method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#replacemanagedbottoken
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Replace, Managed, Bot, Token
// STRUCTURE: ▶ ┌user_id┐ → ◇ construct → ⊕ → ∑ ⟦ReplaceManagedBotTokenRequest⟧

// region CLASS_ReplaceManagedBotTokenRequest
/**
 * @see https://core.telegram.org/bots/api#replacemanagedbottoken
 */
class ReplaceManagedBotTokenRequest implements RequestInterface
{
    /**
     * @param int $user_id User identifier of the managed bot whose token will be replaced
     */
    public function __construct(
        private int $user_id,
    ) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): ReplaceManagedBotTokenRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_ReplaceManagedBotTokenRequest
