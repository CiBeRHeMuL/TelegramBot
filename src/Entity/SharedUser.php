<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object contains information about a user that was shared with the bot using a KeyboardButtonRequestUsers button.
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestusers KeyboardButtonRequestUsers
 * @link https://core.telegram.org/bots/api#shareduser
 */
final class SharedUser implements EntityInterface
{
    /**
     * @param int $user_id Identifier of the shared user. This number may have more than 32 significant bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so 64-bit integers
     * or double-precision float types are safe for storing these identifiers. The bot may not have access to the user and could
     * be unable to use this identifier, unless the user is already known to the bot by some other means.
     * @param string|null $first_name Optional. First name of the user, if the name was requested by the bot
     * @param string|null $last_name Optional. Last name of the user, if the name was requested by the bot
     * @param PhotoSize[]|null $photo Optional. Available sizes of the chat photo, if the photo was requested by the bot
     * @param string|null $username Optional. Username of the user, if the username was requested by the bot
     *
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     */
    public function __construct(
        protected int $user_id,
        protected string|null $first_name = null,
        protected string|null $last_name = null,
        #[ArrayType(PhotoSize::class)]
        protected array|null $photo = null,
        protected string|null $username = null,
    ) {
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     *
     * @return SharedUser
     */
    public function setUserId(int $user_id): SharedUser
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): string|null
    {
        return $this->first_name;
    }

    /**
     * @param string|null $first_name
     *
     * @return SharedUser
     */
    public function setFirstName(string|null $first_name): SharedUser
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): string|null
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     *
     * @return SharedUser
     */
    public function setLastName(string|null $last_name): SharedUser
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): array|null
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[]|null $photo
     *
     * @return SharedUser
     */
    public function setPhoto(array|null $photo): SharedUser
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): string|null
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     *
     * @return SharedUser
     */
    public function setUsername(string|null $username): SharedUser
    {
        $this->username = $username;
        return $this;
    }
}
