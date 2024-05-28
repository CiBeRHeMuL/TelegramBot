<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class UnpinChatMessageRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|null $message_id Identifier of a message to unpin. If not specified, the most recent pinned message (by sending
     * date) will be unpinned.
     */
    public function __construct(
        private ChatId $chat_id,
        private int|null $message_id = null,
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

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_id' => $this->message_id,
        ];
    }
}
