<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class DeleteMessagesRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages to delete. See deleteMessage for limitations
     * on which messages can be deleted
     */
    public function __construct(
        private ChatId $chat_id,
        private array $message_ids,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): DeleteMessagesRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMessageIds(): array
    {
        return $this->message_ids;
    }

    public function setMessageIds(array $message_ids): DeleteMessagesRequest
    {
        $this->message_ids = $message_ids;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_ids' => $this->message_ids,
        ];
    }
}
