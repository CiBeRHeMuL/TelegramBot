<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes the connection of the bot with a business account.
 * @link https://core.telegram.org/bots/api#businessconnection
 */
class BusinessConnection extends AbstractEntity
{
    /**
     * @param string $id Unique identifier of the business connection
     * @param User $user Business account user that created the business connection
     * @param int $user_chat_id Identifier of a protected chat with the user who created the business connection. This number may have
     * more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param int $date Date the connection was established in Unix time
     * @param bool $can_reply True, if the bot can act on behalf of the business account in chats that were active in the last 24
     * hours
     * @param bool $is_enabled True, if the connection is active
     */
    public function __construct(
        protected string $id,
        protected User $user,
        protected int $user_chat_id,
        protected int $date,
        protected bool $can_reply,
        protected bool $is_enabled,
    ) {
        parent::__construct();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): BusinessConnection
    {
        $this->id = $id;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): BusinessConnection
    {
        $this->user = $user;
        return $this;
    }

    public function getUserChatId(): int
    {
        return $this->user_chat_id;
    }

    public function setUserChatId(int $user_chat_id): BusinessConnection
    {
        $this->user_chat_id = $user_chat_id;
        return $this;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): BusinessConnection
    {
        $this->date = $date;
        return $this;
    }

    public function getCanReply(): bool
    {
        return $this->can_reply;
    }

    public function setCanReply(bool $can_reply): BusinessConnection
    {
        $this->can_reply = $can_reply;
        return $this;
    }

    public function getIsEnabled(): bool
    {
        return $this->is_enabled;
    }

    public function setIsEnabled(bool $is_enabled): BusinessConnection
    {
        $this->is_enabled = $is_enabled;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'user' => $this->user->toArray(),
            'user_chat_id' => $this->user_chat_id,
            'date' => $this->date,
            'can_reply' => $this->can_reply,
            'is_enabled' => $this->is_enabled,
        ];
    }
}
