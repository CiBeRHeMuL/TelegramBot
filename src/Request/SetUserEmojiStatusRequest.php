<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#setuseremojistatus
 */
class SetUserEmojiStatusRequest implements RequestInterface
{
    /**
     * @param int $user_id Unique identifier of the target user
     * @param string|null $emoji_status_custom_emoji_id Custom emoji identifier of the emoji status to set. Pass an empty string
     * to remove the status.
     * @param int|null $emoji_status_expiration_date Expiration date of the emoji status, if any
     */
    public function __construct(
        private int $user_id,
        private string|null $emoji_status_custom_emoji_id = null,
        private int|null $emoji_status_expiration_date = null,
    ) {
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): SetUserEmojiStatusRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getEmojiStatusCustomEmojiId(): string|null
    {
        return $this->emoji_status_custom_emoji_id;
    }

    public function setEmojiStatusCustomEmojiId(string|null $emoji_status_custom_emoji_id): SetUserEmojiStatusRequest
    {
        $this->emoji_status_custom_emoji_id = $emoji_status_custom_emoji_id;
        return $this;
    }

    public function getEmojiStatusExpirationDate(): int|null
    {
        return $this->emoji_status_expiration_date;
    }

    public function setEmojiStatusExpirationDate(int|null $emoji_status_expiration_date): SetUserEmojiStatusRequest
    {
        $this->emoji_status_expiration_date = $emoji_status_expiration_date;
        return $this;
    }
}
