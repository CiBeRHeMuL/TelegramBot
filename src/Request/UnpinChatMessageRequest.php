<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API unpinChatMessage method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#unpinchatmessage
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Unpin, Chat, Message
// STRUCTURE: ▶ ┌chat_id + message_id + business_connection_id┐ → ◇ construct → ⊕ → ∑ ⟦UnpinChatMessageRequest⟧

// region CLASS_UnpinChatMessageRequest
/**
 * @see https://core.telegram.org/bots/api#unpinchatmessage
 */
class UnpinChatMessageRequest implements RequestInterface
{
    /**
     * @param ChatId      $chat_id                Unique identifier for the target chat or username of the target channel in the format \@username
     * @param int|null    $message_id             Identifier of the message to unpin. Required if business_connection_id is specified. If not specified,
     *                                            the most recent pinned message (by sending date) will be unpinned.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     *                                            be unpinned
     */
    public function __construct(
        private ChatId $chat_id,
        private ?int $message_id = null,
        private ?string $business_connection_id = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): UnpinChatMessageRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    public function setMessageId(?int $message_id): UnpinChatMessageRequest
    {
        $this->message_id = $message_id;

        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): UnpinChatMessageRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }
}
// endregion CLASS_UnpinChatMessageRequest
