<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes the connection of the bot with a business account.
 *
 * @link https://core.telegram.org/bots/api#businessconnection
 */
final class BusinessConnection implements EntityInterface
{
    /**
     * @param string $id Unique identifier of the business connection
     * @param User $user Business account user that created the business connection
     * @param int $user_chat_id Identifier of a private chat with the user who created the business connection. This number may have
     * more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it
     * has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param int $date Date the connection was established in Unix time
     * @param bool $is_enabled True, if the connection is active
     * @param BusinessBotRights|null $rights Optional. Rights of the business bot
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#businessbotrights BusinessBotRights
     */
    public function __construct(
        protected string $id,
        protected User $user,
        protected int $user_chat_id,
        protected int $date,
        protected bool $is_enabled,
        protected ?BusinessBotRights $rights = null,
    ) {}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return BusinessConnection
     */
    public function setId(string $id): BusinessConnection
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return BusinessConnection
     */
    public function setUser(User $user): BusinessConnection
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserChatId(): int
    {
        return $this->user_chat_id;
    }

    /**
     * @param int $user_chat_id
     *
     * @return BusinessConnection
     */
    public function setUserChatId(int $user_chat_id): BusinessConnection
    {
        $this->user_chat_id = $user_chat_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     *
     * @return BusinessConnection
     */
    public function setDate(int $date): BusinessConnection
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsEnabled(): bool
    {
        return $this->is_enabled;
    }

    /**
     * @param bool $is_enabled
     *
     * @return BusinessConnection
     */
    public function setIsEnabled(bool $is_enabled): BusinessConnection
    {
        $this->is_enabled = $is_enabled;
        return $this;
    }

    /**
     * @return BusinessBotRights|null
     */
    public function getRights(): ?BusinessBotRights
    {
        return $this->rights;
    }

    /**
     * @param BusinessBotRights|null $rights
     *
     * @return BusinessConnection
     */
    public function setRights(?BusinessBotRights $rights): BusinessConnection
    {
        $this->rights = $rights;
        return $this;
    }
}
