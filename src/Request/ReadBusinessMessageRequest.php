<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API readBusinessMessage method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#readbusinessmessage
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Read, Business, Message
// STRUCTURE: ▶ ┌business_connection_id + chat_id + message_id┐ → ◇ construct → ⊕ → ∑ ⟦ReadBusinessMessageRequest⟧

// region CLASS_ReadBusinessMessageRequest
/**
 * @see https://core.telegram.org/bots/api#readbusinessmessage
 */
class ReadBusinessMessageRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection on behalf of which to read the message
     * @param ChatId $chat_id                Unique identifier of the chat in which the message was received. The chat must have been active in
     *                                       the last 24 hours.
     * @param int    $message_id             Unique identifier of the message to mark as read
     */
    public function __construct(
        private string $business_connection_id,
        private ChatId $chat_id,
        private int $message_id,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): ReadBusinessMessageRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): ReadBusinessMessageRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): ReadBusinessMessageRequest
    {
        $this->message_id = $message_id;

        return $this;
    }
}
// endregion CLASS_ReadBusinessMessageRequest
