<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InputSticker;
use AndrewGos\TelegramBot\Enum\StickerTypeEnum;

/**
 * @link https://core.telegram.org/bots/api#createnewstickerset
 */
class CreateNewStickerSetRequest implements RequestInterface
{
    /**
     * @param string $name Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only English
     * letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in "_by_<bot_username>".
     * <bot_username> is case insensitive. 1-64 characters.
     * @param InputSticker[] $stickers A JSON-serialized list of 1-50 initial stickers to be added to the sticker set
     * @param string $title Sticker set title, 1-64 characters
     * @param int $user_id User identifier of created sticker set owner
     * @param bool|null $needs_repainting Pass True if stickers in the sticker set must be repainted to the color of text when used
     * in messages, the accent color if used as emoji status, white on chat photos, or another appropriate color based on context;
     * for custom emoji sticker sets only
     * @param StickerTypeEnum|null $sticker_type Type of stickers in the set, pass “regular”, “mask”, or “custom_emoji”.
     * By default, a regular sticker set is created.
     *
     * @see https://core.telegram.org/bots/api#inputsticker InputSticker
     */
    public function __construct(
        private string $name,
        private array $stickers,
        private string $title,
        private int $user_id,
        private bool|null $needs_repainting = null,
        private StickerTypeEnum|null $sticker_type = null,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CreateNewStickerSetRequest
    {
        $this->name = $name;
        return $this;
    }

    public function getStickers(): array
    {
        return $this->stickers;
    }

    public function setStickers(array $stickers): CreateNewStickerSetRequest
    {
        $this->stickers = $stickers;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): CreateNewStickerSetRequest
    {
        $this->title = $title;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): CreateNewStickerSetRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getNeedsRepainting(): bool|null
    {
        return $this->needs_repainting;
    }

    public function setNeedsRepainting(bool|null $needs_repainting): CreateNewStickerSetRequest
    {
        $this->needs_repainting = $needs_repainting;
        return $this;
    }

    public function getStickerType(): StickerTypeEnum|null
    {
        return $this->sticker_type;
    }

    public function setStickerType(StickerTypeEnum|null $sticker_type): CreateNewStickerSetRequest
    {
        $this->sticker_type = $sticker_type;
        return $this;
    }
}
