<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getUserPersonalChatMessages method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getuserpersonalchatmessages
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, User, Personal, Chat, Messages
// STRUCTURE: ▶ ┌limit + user_id┐ → ◇ construct → ⊕ → ∑ ⟦GetUserPersonalChatMessagesRequest⟧

// region CLASS_GetUserPersonalChatMessagesRequest
/**
 * @see https://core.telegram.org/bots/api#getuserpersonalchatmessages
 */
class GetUserPersonalChatMessagesRequest implements RequestInterface
{
    /**
     * @param int $limit   The maximum number of messages to return; 1-20
     * @param int $user_id Unique identifier for the target user
     */
    public function __construct(
        private int $limit,
        private int $user_id,
    ) {}

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): GetUserPersonalChatMessagesRequest
    {
        $this->limit = $limit;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetUserPersonalChatMessagesRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_GetUserPersonalChatMessagesRequest
