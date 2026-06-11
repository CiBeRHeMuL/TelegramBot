<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API unbanChatSenderChat method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#unbanchatsenderchat
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Unban, Chat, Sender, Chat
// STRUCTURE: ▶ ┌chat_id + sender_chat_id┐ → ◇ construct → ⊕ → ∑ ⟦UnbanChatSenderChatRequest⟧

// region CLASS_UnbanChatSenderChatRequest
/**
 * @see https://core.telegram.org/bots/api#unbanchatsenderchat
 */
class UnbanChatSenderChatRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id        Unique identifier for the target chat or username of the target channel in the format \@username
     * @param int    $sender_chat_id Unique identifier of the target sender chat
     */
    public function __construct(
        private ChatId $chat_id,
        private int $sender_chat_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): UnbanChatSenderChatRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getSenderChatId(): int
    {
        return $this->sender_chat_id;
    }

    public function setSenderChatId(int $sender_chat_id): UnbanChatSenderChatRequest
    {
        $this->sender_chat_id = $sender_chat_id;

        return $this;
    }
}
// endregion CLASS_UnbanChatSenderChatRequest
