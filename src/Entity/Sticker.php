<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\StickerTypeEnum;

/**
 * This object represents a sticker.
 *
 * @link https://core.telegram.org/bots/api#sticker
 */
final class Sticker implements EntityInterface
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different
     * bots. Can't be used to download or reuse the file.
     * @param StickerTypeEnum $type Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type
     * of the sticker is independent from its format, which is determined by the fields is_animated and is_video.
     * @param int $width Sticker width
     * @param int $height Sticker height
     * @param bool $is_animated True, if the sticker is animated
     * @param bool $is_video True, if the sticker is a video sticker
     * @param PhotoSize|null $thumbnail Optional. Sticker thumbnail in the .WEBP or .JPG format
     * @param string|null $emoji Optional. Emoji associated with the sticker
     * @param string|null $set_name Optional. Name of the sticker set to which the sticker belongs
     * @param File|null $premium_animation Optional. For premium regular stickers, premium animation for the sticker
     * @param MaskPosition|null $mask_position Optional. For mask stickers, the position where the mask should be placed
     * @param string|null $custom_emoji_id Optional. For custom emoji stickers, unique identifier of the custom emoji
     * @param bool|null $needs_repainting Optional. True, if the sticker must be repainted to a text color in messages, the color
     * of the Telegram Premium badge in emoji status, white color on chat photos, or another appropriate color in other places
     * @param int|null $file_size Optional. File size in bytes
     *
     * @see https://telegram.org/blog/animated-stickers animated
     * @see https://telegram.org/blog/video-stickers-better-reactions video sticker
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     * @see https://core.telegram.org/bots/api#file File
     * @see https://core.telegram.org/bots/api#maskposition MaskPosition
     */
    public function __construct(
        protected string $file_id,
        protected string $file_unique_id,
        protected StickerTypeEnum $type,
        protected int $width,
        protected int $height,
        protected bool $is_animated,
        protected bool $is_video,
        protected PhotoSize|null $thumbnail = null,
        protected string|null $emoji = null,
        protected string|null $set_name = null,
        protected File|null $premium_animation = null,
        protected MaskPosition|null $mask_position = null,
        protected string|null $custom_emoji_id = null,
        protected bool|null $needs_repainting = null,
        protected int|null $file_size = null,
    ) {
    }

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * @param string $file_id
     *
     * @return Sticker
     */
    public function setFileId(string $file_id): Sticker
    {
        $this->file_id = $file_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    /**
     * @param string $file_unique_id
     *
     * @return Sticker
     */
    public function setFileUniqueId(string $file_unique_id): Sticker
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    /**
     * @return StickerTypeEnum
     */
    public function getType(): StickerTypeEnum
    {
        return $this->type;
    }

    /**
     * @param StickerTypeEnum $type
     *
     * @return Sticker
     */
    public function setType(StickerTypeEnum $type): Sticker
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return Sticker
     */
    public function setWidth(int $width): Sticker
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return Sticker
     */
    public function setHeight(int $height): Sticker
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAnimated(): bool
    {
        return $this->is_animated;
    }

    /**
     * @param bool $is_animated
     *
     * @return Sticker
     */
    public function setIsAnimated(bool $is_animated): Sticker
    {
        $this->is_animated = $is_animated;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsVideo(): bool
    {
        return $this->is_video;
    }

    /**
     * @param bool $is_video
     *
     * @return Sticker
     */
    public function setIsVideo(bool $is_video): Sticker
    {
        $this->is_video = $is_video;
        return $this;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumbnail(): PhotoSize|null
    {
        return $this->thumbnail;
    }

    /**
     * @param PhotoSize|null $thumbnail
     *
     * @return Sticker
     */
    public function setThumbnail(PhotoSize|null $thumbnail): Sticker
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmoji(): string|null
    {
        return $this->emoji;
    }

    /**
     * @param string|null $emoji
     *
     * @return Sticker
     */
    public function setEmoji(string|null $emoji): Sticker
    {
        $this->emoji = $emoji;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSetName(): string|null
    {
        return $this->set_name;
    }

    /**
     * @param string|null $set_name
     *
     * @return Sticker
     */
    public function setSetName(string|null $set_name): Sticker
    {
        $this->set_name = $set_name;
        return $this;
    }

    /**
     * @return File|null
     */
    public function getPremiumAnimation(): File|null
    {
        return $this->premium_animation;
    }

    /**
     * @param File|null $premium_animation
     *
     * @return Sticker
     */
    public function setPremiumAnimation(File|null $premium_animation): Sticker
    {
        $this->premium_animation = $premium_animation;
        return $this;
    }

    /**
     * @return MaskPosition|null
     */
    public function getMaskPosition(): MaskPosition|null
    {
        return $this->mask_position;
    }

    /**
     * @param MaskPosition|null $mask_position
     *
     * @return Sticker
     */
    public function setMaskPosition(MaskPosition|null $mask_position): Sticker
    {
        $this->mask_position = $mask_position;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomEmojiId(): string|null
    {
        return $this->custom_emoji_id;
    }

    /**
     * @param string|null $custom_emoji_id
     *
     * @return Sticker
     */
    public function setCustomEmojiId(string|null $custom_emoji_id): Sticker
    {
        $this->custom_emoji_id = $custom_emoji_id;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNeedsRepainting(): bool|null
    {
        return $this->needs_repainting;
    }

    /**
     * @param bool|null $needs_repainting
     *
     * @return Sticker
     */
    public function setNeedsRepainting(bool|null $needs_repainting): Sticker
    {
        $this->needs_repainting = $needs_repainting;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): int|null
    {
        return $this->file_size;
    }

    /**
     * @param int|null $file_size
     *
     * @return Sticker
     */
    public function setFileSize(int|null $file_size): Sticker
    {
        $this->file_size = $file_size;
        return $this;
    }
}
