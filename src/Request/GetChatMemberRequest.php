<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getChatMember method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getchatmember
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, Chat, Member
// STRUCTURE: ▶ ┌chat_id + user_id┐ → ◇ construct → ⊕ → ∑ ⟦GetChatMemberRequest⟧

// region CLASS_GetChatMemberRequest
/**
 * @see https://core.telegram.org/bots/api#getchatmember
 */
class GetChatMemberRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup or channel in the format
     *                        \@username
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

    public function setChatId(ChatId $chat_id): GetChatMemberRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetChatMemberRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_GetChatMemberRequest
