<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class PinChatMessageRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $message_id Identifier of a message to pin
     * @param bool|null $disable_notification Pass True if it is not necessary to send a notification to all chat members about the
     * new pinned message. Notifications are always disabled in channels and private chats.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will be pinned
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_id,
        private bool|null $disable_notification = null,
        private string|null $business_connection_id = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): PinChatMessageRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): PinChatMessageRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): PinChatMessageRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): PinChatMessageRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_id' => $this->message_id,
            'disable_notification' => $this->disable_notification,
            'business_connection_id' => $this->business_connection_id,
        ];
    }
}
