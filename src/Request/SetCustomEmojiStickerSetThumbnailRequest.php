<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
 */
class SetCustomEmojiStickerSetThumbnailRequest implements RequestInterface
{
    /**
     * @param string $name Sticker set name
     * @param string|null $custom_emoji_id Custom emoji identifier of a sticker from the sticker set; pass an empty string to drop
     * the thumbnail and use the first sticker as the thumbnail.
     */
    public function __construct(
        private string $name,
        private string|null $custom_emoji_id = null,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SetCustomEmojiStickerSetThumbnailRequest
    {
        $this->name = $name;
        return $this;
    }

    public function getCustomEmojiId(): string|null
    {
        return $this->custom_emoji_id;
    }

    public function setCustomEmojiId(string|null $custom_emoji_id): SetCustomEmojiStickerSetThumbnailRequest
    {
        $this->custom_emoji_id = $custom_emoji_id;
        return $this;
    }
}
