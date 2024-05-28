<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a story.
 * @link https://core.telegram.org/bots/api#story
 */
class Story implements EntityInterface
{
    /**
     * @param Chat $chat Chat that posted the story.
     * @param int $id Unique identifier for the story in the chat.
     */
    public function __construct(
        private Chat $chat,
        private int $id,
    ) {
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): Story
    {
        $this->chat = $chat;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Story
    {
        $this->id = $id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat' => $this->chat->toArray(),
            'id' => $this->id,
        ];
    }
}
