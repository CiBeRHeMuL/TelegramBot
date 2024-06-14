<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\StickerTypeEnum;
use stdClass;

class Sticker extends AbstractEntity
{
    /**
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file.
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     * Can't be used to download or reuse the file.
     * @param StickerTypeEnum $type Type of the sticker.
     * The type of the sticker is independent of its format, which is determined by the fields is_animated and is_video.
     * @param int $width Sticker width.
     * @param int $height Sticker height.
     * @param bool $is_animated True, if the sticker is animated.
     * @param bool $is_video True, if the sticker is a video sticker.
     * @param PhotoSize|null $thumbnail Optional. Sticker thumbnail in the .WEBP or .JPG format.
     * @param string|null $emoji Optional. Emoji associated with the sticker.
     * @param string|null $set_name Optional. Name of the sticker set to which the sticker belongs.
     * @param File|null $premium_animation Optional. For premium regular stickers, premium animation for the sticker.
     * @param MaskPosition|null $mask_position Optional. For mask stickers, the position where the mask should be placed.
     * @param string|null $custom_emoji_id Optional. For custom emoji stickers, unique identifier of the custom emoji.
     * @param bool|null $needs_repainting Optional.
     * True, if the sticker must be repainted to a text color in messages, the color of the Telegram Premium badge in emoji status,
     * white color on chat photos, or another appropriate color in other places.
     * @param int|null $file_size Optional. File size in bytes.
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
        parent::__construct();
    }

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function setFileId(string $file_id): Sticker
    {
        $this->file_id = $file_id;
        return $this;
    }

    public function getFileUniqueId(): string
    {
        return $this->file_unique_id;
    }

    public function setFileUniqueId(string $file_unique_id): Sticker
    {
        $this->file_unique_id = $file_unique_id;
        return $this;
    }

    public function getType(): StickerTypeEnum
    {
        return $this->type;
    }

    public function setType(StickerTypeEnum $type): Sticker
    {
        $this->type = $type;
        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): Sticker
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): Sticker
    {
        $this->height = $height;
        return $this;
    }

    public function isIsAnimated(): bool
    {
        return $this->is_animated;
    }

    public function setIsAnimated(bool $is_animated): Sticker
    {
        $this->is_animated = $is_animated;
        return $this;
    }

    public function isIsVideo(): bool
    {
        return $this->is_video;
    }

    public function setIsVideo(bool $is_video): Sticker
    {
        $this->is_video = $is_video;
        return $this;
    }

    public function getThumbnail(): PhotoSize|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(PhotoSize|null $thumbnail): Sticker
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getEmoji(): string|null
    {
        return $this->emoji;
    }

    public function setEmoji(string|null $emoji): Sticker
    {
        $this->emoji = $emoji;
        return $this;
    }

    public function getSetName(): string|null
    {
        return $this->set_name;
    }

    public function setSetName(string|null $set_name): Sticker
    {
        $this->set_name = $set_name;
        return $this;
    }

    public function getPremiumAnimation(): File|null
    {
        return $this->premium_animation;
    }

    public function setPremiumAnimation(File|null $premium_animation): Sticker
    {
        $this->premium_animation = $premium_animation;
        return $this;
    }

    public function getMaskPosition(): MaskPosition|null
    {
        return $this->mask_position;
    }

    public function setMaskPosition(MaskPosition|null $mask_position): Sticker
    {
        $this->mask_position = $mask_position;
        return $this;
    }

    public function getCustomEmojiId(): string|null
    {
        return $this->custom_emoji_id;
    }

    public function setCustomEmojiId(string|null $custom_emoji_id): Sticker
    {
        $this->custom_emoji_id = $custom_emoji_id;
        return $this;
    }

    public function getNeedsRepainting(): bool|null
    {
        return $this->needs_repainting;
    }

    public function setNeedsRepainting(bool|null $needs_repainting): Sticker
    {
        $this->needs_repainting = $needs_repainting;
        return $this;
    }

    public function getFileSize(): int|null
    {
        return $this->file_size;
    }

    public function setFileSize(int|null $file_size): Sticker
    {
        $this->file_size = $file_size;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'file_id' => $this->file_id,
            'file_unique_id' => $this->file_unique_id,
            'type' => $this->type->value,
            'width' => $this->width,
            'height' => $this->height,
            'is_animated' => $this->is_animated,
            'is_video' => $this->is_video,
            'thumbnail' => $this->thumbnail?->toArray(),
            'emoji' => $this->emoji,
            'set_name' => $this->set_name,
            'premium_animation' => $this->premium_animation?->toArray(),
            'mask_position' => $this->mask_position?->toArray(),
            'custom_emoji_id' => $this->custom_emoji_id,
            'needs_repainting' => $this->needs_repainting,
            'file_size' => $this->file_size,
        ];
    }
}
