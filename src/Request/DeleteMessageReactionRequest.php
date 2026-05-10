<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#deletemessagereaction
 */
class DeleteMessageReactionRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format \@username)
     * @param int $message_id Identifier of the target message
     * @param int|null $actor_chat_id Identifier of the chat whose reaction will be removed, if the reaction was added by a chat
     * @param int|null $user_id Identifier of the user whose reaction will be removed, if the reaction was added by a user
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_id,
        private ?int $actor_chat_id = null,
        private ?int $user_id = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): DeleteMessageReactionRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): DeleteMessageReactionRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getActorChatId(): ?int
    {
        return $this->actor_chat_id;
    }

    public function setActorChatId(?int $actor_chat_id): DeleteMessageReactionRequest
    {
        $this->actor_chat_id = $actor_chat_id;
        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): DeleteMessageReactionRequest
    {
        $this->user_id = $user_id;
        return $this;
    }
}
