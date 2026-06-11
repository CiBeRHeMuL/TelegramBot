<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API banChatSenderChat method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#banchatsenderchat
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Ban, Chat, Sender, Chat
// STRUCTURE: ▶ ┌chat_id + sender_chat_id┐ → ◇ construct → ⊕ → ∑ ⟦BanChatSenderChatRequest⟧

// region CLASS_BanChatSenderChatRequest
/**
 * @see https://core.telegram.org/bots/api#banchatsenderchat
 */
class BanChatSenderChatRequest implements RequestInterface
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

    public function setChatId(ChatId $chat_id): BanChatSenderChatRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getSenderChatId(): int
    {
        return $this->sender_chat_id;
    }

    public function setSenderChatId(int $sender_chat_id): BanChatSenderChatRequest
    {
        $this->sender_chat_id = $sender_chat_id;

        return $this;
    }
}
// endregion CLASS_BanChatSenderChatRequest
