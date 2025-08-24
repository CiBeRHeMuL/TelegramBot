<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#declinesuggestedpost
 */
class DeclineSuggestedPostRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target direct messages chat
     * @param int $message_id Identifier of a suggested post message to decline
     * @param string|null $comment Comment for the creator of the suggested post; 0-128 characters
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_id,
        private string|null $comment = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): DeclineSuggestedPostRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): DeclineSuggestedPostRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getComment(): string|null
    {
        return $this->comment;
    }

    public function setComment(string|null $comment): DeclineSuggestedPostRequest
    {
        $this->comment = $comment;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'message_id' => $this->message_id,
            'comment' => $this->comment,
        ];
    }
}
