<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#unpinchatmessage
 */
class UnpinChatMessageRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param int|null $message_id Identifier of the message to unpin. Required if business_connection_id is specified. If not specified,
     * the most recent pinned message (by sending date) will be unpinned.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be unpinned
     */
    public function __construct(
        private ChatId $chat_id,
        private int|null $message_id = null,
        private string|null $business_connection_id = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): UnpinChatMessageRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMessageId(): int|null
    {
        return $this->message_id;
    }

    public function setMessageId(int|null $message_id): UnpinChatMessageRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): UnpinChatMessageRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_id' => $this->message_id,
            'business_connection_id' => $this->business_connection_id,
        ];
    }
}
