<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;

/**
 * This object represents reaction changes on a message with anonymous reactions.
 * @link https://core.telegram.org/bots/api#messagereactioncountupdated
 */
class MessageReactionCountUpdated implements EntityInterface
{
    /**
     * @param Chat $chat The chat containing the message
     * @param int $message_id Unique message identifier inside the chat
     * @param int $date Date of the change in Unix time
     * @param ReactionCount[] $reactions List of reactions that are present on the message
     */
    public function __construct(
        private Chat $chat,
        private int $message_id,
        private int $date,
        #[ArrayType(ReactionCount::class)] private array $reactions,
    ) {
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): MessageReactionCountUpdated
    {
        $this->chat = $chat;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): MessageReactionCountUpdated
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): MessageReactionCountUpdated
    {
        $this->date = $date;
        return $this;
    }

    public function getReactions(): array
    {
        return $this->reactions;
    }

    public function setReactions(array $reactions): MessageReactionCountUpdated
    {
        $this->reactions = $reactions;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat' => $this->chat->toArray(),
            'message_id' => $this->message_id,
            'date' => $this->date,
            'reactions' => array_map(fn(ReactionCount $e) => $e->toArray(), $this->reactions),
        ];
    }
}
