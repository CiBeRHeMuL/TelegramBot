<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\StickerTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a sticker set.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#stickerset
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: StickerSet, Telegram, Bot API, DTO, stickerset
// STRUCTURE: ▶ ┌name,title,sticker_type,stickers: Sticker[]┐ → ◇ thumbnail → ∑ StickerSet
// region CLASS_StickerSet

/**
 * This object represents a sticker set.
 *
 * @see https://core.telegram.org/bots/api#stickerset
 */
final class StickerSet implements EntityInterface
{
    /**
     * @param string          $name         Sticker set name
     * @param string          $title        Sticker set title
     * @param StickerTypeEnum $sticker_type Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
     * @param Sticker[]       $stickers     List of all set stickers
     * @param PhotoSize|null  $thumbnail    Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
     *
     * @see https://core.telegram.org/bots/api#sticker Sticker
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     */
    public function __construct(
        protected string $name,
        protected string $title,
        protected StickerTypeEnum $sticker_type,
        #[ArrayType(Sticker::class)]
        protected array $stickers,
        protected ?PhotoSize $thumbnail = null,
    ) {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return StickerSet
     */
    public function setName(string $name): StickerSet
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return StickerSet
     */
    public function setTitle(string $title): StickerSet
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return StickerTypeEnum
     */
    public function getStickerType(): StickerTypeEnum
    {
        return $this->sticker_type;
    }

    /**
     * @param StickerTypeEnum $sticker_type
     *
     * @return StickerSet
     */
    public function setStickerType(StickerTypeEnum $sticker_type): StickerSet
    {
        $this->sticker_type = $sticker_type;

        return $this;
    }

    /**
     * @return Sticker[]
     */
    public function getStickers(): array
    {
        return $this->stickers;
    }

    /**
     * @param Sticker[] $stickers
     *
     * @return StickerSet
     */
    public function setStickers(array $stickers): StickerSet
    {
        $this->stickers = $stickers;

        return $this;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumbnail(): ?PhotoSize
    {
        return $this->thumbnail;
    }

    /**
     * @param PhotoSize|null $thumbnail
     *
     * @return StickerSet
     */
    public function setThumbnail(?PhotoSize $thumbnail): StickerSet
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}

// endregion CLASS_StickerSet
