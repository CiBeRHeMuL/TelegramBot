<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API deleteMessage method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#deletemessage
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Delete, Message
// STRUCTURE: ▶ ┌chat_id + message_id┐ → ◇ construct → ⊕ → ∑ ⟦DeleteMessageRequest⟧

// region CLASS_DeleteMessageRequest
/**
 * @see https://core.telegram.org/bots/api#deletemessage
 */
class DeleteMessageRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id    Unique identifier for the target chat or username of the target bot, supergroup or channel in the format
     *                           \@username
     * @param int    $message_id Identifier of the message to delete
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): DeleteMessageRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): DeleteMessageRequest
    {
        $this->message_id = $message_id;

        return $this;
    }
}
// endregion CLASS_DeleteMessageRequest
