<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\RequestId;
use stdClass;

/**
 * This object defines the criteria used to request suitable users. Information about the selected users will be shared with
 * the bot when the corresponding button is pressed.
 * @link https://core.telegram.org/bots/features#chat-and-user-selection More about requesting users
 * @link https://core.telegram.org/bots/api#keyboardbuttonrequestusers
 */
class KeyboardButtonRequestUsers extends AbstractEntity
{
    /**
     * @param RequestId $request_id Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must
     * be unique within the message
     * @param int|null $max_quantity Optional. The maximum number of users to be selected; 1-10. Defaults to 1.
     * @param bool|null $request_name Optional. Pass True to request the users' first and last names
     * @param bool|null $request_photo Optional. Pass True to request the users' photos
     * @param bool|null $request_username Optional. Pass True to request the users' usernames
     * @param bool|null $user_is_bot Optional. Pass True to request bots, pass False to request regular users. If not specified,
     * no additional restrictions are applied.
     * @param bool|null $user_is_premium Optional. Pass True to request premium users, pass False to request non-premium users. If
     * not specified, no additional restrictions are applied.
     */
    public function __construct(
        protected RequestId $request_id,
        protected int|null $max_quantity = null,
        protected bool|null $request_name = null,
        protected bool|null $request_photo = null,
        protected bool|null $request_username = null,
        protected bool|null $user_is_bot = null,
        protected bool|null $user_is_premium = null,
    ) {
        parent::__construct();
    }

    public function getRequestId(): RequestId
    {
        return $this->request_id;
    }

    public function setRequestId(RequestId $request_id): KeyboardButtonRequestUsers
    {
        $this->request_id = $request_id;
        return $this;
    }

    public function getMaxQuantity(): int|null
    {
        return $this->max_quantity;
    }

    public function setMaxQuantity(int|null $max_quantity): KeyboardButtonRequestUsers
    {
        $this->max_quantity = $max_quantity;
        return $this;
    }

    public function getRequestName(): bool|null
    {
        return $this->request_name;
    }

    public function setRequestName(bool|null $request_name): KeyboardButtonRequestUsers
    {
        $this->request_name = $request_name;
        return $this;
    }

    public function getRequestPhoto(): bool|null
    {
        return $this->request_photo;
    }

    public function setRequestPhoto(bool|null $request_photo): KeyboardButtonRequestUsers
    {
        $this->request_photo = $request_photo;
        return $this;
    }

    public function getRequestUsername(): bool|null
    {
        return $this->request_username;
    }

    public function setRequestUsername(bool|null $request_username): KeyboardButtonRequestUsers
    {
        $this->request_username = $request_username;
        return $this;
    }

    public function getUserIsBot(): bool|null
    {
        return $this->user_is_bot;
    }

    public function setUserIsBot(bool|null $user_is_bot): KeyboardButtonRequestUsers
    {
        $this->user_is_bot = $user_is_bot;
        return $this;
    }

    public function getUserIsPremium(): bool|null
    {
        return $this->user_is_premium;
    }

    public function setUserIsPremium(bool|null $user_is_premium): KeyboardButtonRequestUsers
    {
        $this->user_is_premium = $user_is_premium;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'request_id' => $this->request_id->getId(),
            'max_quantity' => $this->max_quantity,
            'request_name' => $this->request_name,
            'request_photo' => $this->request_photo,
            'request_username' => $this->request_username,
            'user_is_bot' => $this->user_is_bot,
            'user_is_premium' => $this->user_is_premium,
        ];
    }
}
