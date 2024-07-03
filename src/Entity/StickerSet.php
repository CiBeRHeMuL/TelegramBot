<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\StickerTypeEnum;
use stdClass;

/**
 * This object represents a sticker set.
 * @link https://core.telegram.org/bots/api#stickerset
 */
class StickerSet extends AbstractEntity
{
    /**
     * @param string $name Sticker set name
     * @param string $title Sticker set title
     * @param StickerTypeEnum $sticker_type Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
     * @param Sticker[] $stickers List of all set stickers
     * @param PhotoSize|null $thumbnail Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
     */
    public function __construct(
        protected string $name,
        protected string $title,
        protected StickerTypeEnum $sticker_type,
        #[ArrayType(Sticker::class)] protected array $stickers,
        protected PhotoSize|null $thumbnail = null,
    ) {
        parent::__construct();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): StickerSet
    {
        $this->name = $name;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): StickerSet
    {
        $this->title = $title;
        return $this;
    }

    public function getStickerType(): StickerTypeEnum
    {
        return $this->sticker_type;
    }

    public function setStickerType(StickerTypeEnum $sticker_type): StickerSet
    {
        $this->sticker_type = $sticker_type;
        return $this;
    }

    public function getStickers(): array
    {
        return $this->stickers;
    }

    public function setStickers(array $stickers): StickerSet
    {
        $this->stickers = $stickers;
        return $this;
    }

    public function getThumbnail(): PhotoSize|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(PhotoSize|null $thumbnail): StickerSet
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'name' => $this->name,
            'title' => $this->title,
            'sticker_type' => $this->sticker_type->value,
            'stickers' => array_map(fn(Sticker $e) => $e->toArray(), $this->stickers),
            'thumbnail' => $this->thumbnail?->toArray(),
        ];
    }
}
