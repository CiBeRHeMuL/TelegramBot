<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API deleteEphemeralMessage method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#deleteephemeralmessage
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Delete, Ephemeral, Message
// STRUCTURE: ▶ ┌chat_id + receiver_user_id + ephemeral_message_id┐ → ◇ construct → ⊕ → ∑ ⟦DeleteEphemeralMessageRequest⟧

// region CLASS_DeleteEphemeralMessageRequest
/**
 * @see https://core.telegram.org/bots/api#deleteephemeralmessage
 */
class DeleteEphemeralMessageRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id              Unique identifier for the target chat or username of the target bot, supergroup or channel in the format @username
     * @param int    $receiver_user_id     Identifier of the user who received the message; required if the message is an ephemeral message
     * @param int    $ephemeral_message_id Identifier of the ephemeral message to delete
     */
    public function __construct(
        private ChatId $chat_id,
        private int $receiver_user_id,
        private int $ephemeral_message_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): DeleteEphemeralMessageRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getReceiverUserId(): int
    {
        return $this->receiver_user_id;
    }

    public function setReceiverUserId(int $receiver_user_id): DeleteEphemeralMessageRequest
    {
        $this->receiver_user_id = $receiver_user_id;

        return $this;
    }

    public function getEphemeralMessageId(): int
    {
        return $this->ephemeral_message_id;
    }

    public function setEphemeralMessageId(int $ephemeral_message_id): DeleteEphemeralMessageRequest
    {
        $this->ephemeral_message_id = $ephemeral_message_id;

        return $this;
    }
}
// endregion CLASS_DeleteEphemeralMessageRequest
