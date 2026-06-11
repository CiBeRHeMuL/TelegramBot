<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API declineChatJoin method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#declinechatjoin
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Decline, Chat, Join
// STRUCTURE: ▶ ┌chat_id + user_id┐ → ◇ construct → ⊕ → ∑ ⟦DeclineChatJoinRequestRequest⟧

// region CLASS_DeclineChatJoinRequestRequest
/**
 * @see https://core.telegram.org/bots/api#declinechatjoinrequest
 */
class DeclineChatJoinRequestRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel in the format \@username
     * @param int    $user_id Unique identifier of the target user
     */
    public function __construct(
        private ChatId $chat_id,
        private int $user_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): DeclineChatJoinRequestRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): DeclineChatJoinRequestRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_DeclineChatJoinRequestRequest
