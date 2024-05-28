<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class ReopenForumTopicRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_thread_id,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): ReopenForumTopicRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMessageThreadId(): int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int $message_thread_id): ReopenForumTopicRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_thread_id' => $this->message_thread_id,
        ];
    }
}
