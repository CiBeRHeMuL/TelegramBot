<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\ChatTypeEnum;

/**
 * This object represents a chat.
 *
 * @link https://core.telegram.org/bots/api#chat
 */
final class Chat implements EntityInterface
{
    /**
     * @param int $id Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages
     * may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer
     * or double-precision float type are safe for storing this identifier.
     * @param ChatTypeEnum $type Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
     * @param string|null $first_name Optional. First name of the other party in a private chat
     * @param bool|null $is_forum Optional. True, if the supergroup chat is a forum (has topics enabled)
     * @param string|null $last_name Optional. Last name of the other party in a private chat
     * @param string|null $title Optional. Title, for supergroups, channels and group chats
     * @param string|null $username Optional. Username, for private chats, supergroups and channels if available
     * @param bool|null $is_direct_messages Optional. True, if the chat is the direct messages chat of a channel
     *
     * @see https://telegram.org/blog/topics-in-groups-collectible-usernames#topics-in-groups topics
     */
    public function __construct(
        protected int $id,
        protected ChatTypeEnum $type,
        protected ?string $first_name = null,
        protected ?bool $is_forum = null,
        protected ?string $last_name = null,
        protected ?string $title = null,
        protected ?string $username = null,
        protected ?bool $is_direct_messages = null,
    ) {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Chat
     */
    public function setId(int $id): Chat
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return ChatTypeEnum
     */
    public function getType(): ChatTypeEnum
    {
        return $this->type;
    }

    /**
     * @param ChatTypeEnum $type
     *
     * @return Chat
     */
    public function setType(ChatTypeEnum $type): Chat
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string|null $first_name
     *
     * @return Chat
     */
    public function setFirstName(?string $first_name): Chat
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsForum(): ?bool
    {
        return $this->is_forum;
    }

    /**
     * @param bool|null $is_forum
     *
     * @return Chat
     */
    public function setIsForum(?bool $is_forum): Chat
    {
        $this->is_forum = $is_forum;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     *
     * @return Chat
     */
    public function setLastName(?string $last_name): Chat
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return Chat
     */
    public function setTitle(?string $title): Chat
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     *
     * @return Chat
     */
    public function setUsername(?string $username): Chat
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsDirectMessages(): ?bool
    {
        return $this->is_direct_messages;
    }

    /**
     * @param bool|null $is_direct_messages
     *
     * @return Chat
     */
    public function setIsDirectMessages(?bool $is_direct_messages): Chat
    {
        $this->is_direct_messages = $is_direct_messages;
        return $this;
    }
}
