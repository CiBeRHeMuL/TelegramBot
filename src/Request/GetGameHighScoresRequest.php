<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

class GetGameHighScoresRequest implements RequestInterface
{
    /**
     * @param int $user_id Target user id
     * @param ChatId|null $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat
     * @param string|null $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param int|null $message_id Required if inline_message_id is not specified. Identifier of the sent message
     */
    public function __construct(
        private int $user_id,
        private ?ChatId $chat_id = null,
        private ?string $inline_message_id = null,
        private ?int $message_id = null,
    ) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetGameHighScoresRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getChatId(): ?ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(?ChatId $chat_id): GetGameHighScoresRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(?string $inline_message_id): GetGameHighScoresRequest
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    public function setMessageId(?int $message_id): GetGameHighScoresRequest
    {
        $this->message_id = $message_id;
        return $this;
    }
}
