<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#readbusinessmessage
 */
class ReadBusinessMessageRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection on behalf of which to read the message
     * @param ChatId $chat_id Unique identifier of the chat in which the message was received. The chat must have been active in
     * the last 24 hours.
     * @param int $message_id Unique identifier of the message to mark as read
     */
    public function __construct(
        private string $business_connection_id,
        private ChatId $chat_id,
        private int $message_id,
    ) {
    }

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

    public function toArray(): array
    {
        return [
            'business_connection_id' => $this->business_connection_id,
            'chat_id' => $this->chat_id->getId(),
            'message_id' => $this->message_id,
        ];
    }
}
