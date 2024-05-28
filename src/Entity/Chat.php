<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a chat.
 * @link https://core.telegram.org/bots/api#chat
 */
class Chat implements EntityInterface
{
    /**
     * @param int $id Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages
     * may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer
     * or double-precision float type are safe for storing this identifier.
     * @param string $type Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
     * @param string|null $first_name Optional. First name of the other party in a private chat
     * @param bool|null $is_forum Optional. True, if the supergroup chat is a forum (has topics enabled)
     * @param string|null $last_name Optional. Last name of the other party in a private chat
     * @param string|null $title Optional. Title, for supergroups, channels and group chats
     * @param string|null $username Optional. Username, for private chats, supergroups and channels if available
     */
    public function __construct(
        private int $id,
        private string $type,
        private string|null $first_name = null,
        private bool|null $is_forum = null,
        private string|null $last_name = null,
        private string|null $title = null,
        private string|null $username = null,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Chat
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Chat
    {
        $this->type = $type;
        return $this;
    }

    public function getFirstName(): string|null
    {
        return $this->first_name;
    }

    public function setFirstName(string|null $first_name): Chat
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getIsForum(): bool|null
    {
        return $this->is_forum;
    }

    public function setIsForum(bool|null $is_forum): Chat
    {
        $this->is_forum = $is_forum;
        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->last_name;
    }

    public function setLastName(string|null $last_name): Chat
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): Chat
    {
        $this->title = $title;
        return $this;
    }

    public function getUsername(): string|null
    {
        return $this->username;
    }

    public function setUsername(string|null $username): Chat
    {
        $this->username = $username;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'first_name' => $this->first_name,
            'is_forum' => $this->is_forum,
            'last_name' => $this->last_name,
            'title' => $this->title,
            'username' => $this->username,
        ];
    }
}
