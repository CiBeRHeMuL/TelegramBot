<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\StickerFormatEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * This object describes a sticker to be added to a sticker set.
 * @link https://core.telegram.org/bots/api#inputsticker
 */
class InputSticker implements EntityInterface
{
    /**
     * @param Filename|Url|string $sticker The added sticker. Pass a file_id as a String to send a file that already exists on the
     * Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, upload a new one using multipart/form-data,
     * or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. Animated
     * and video stickers can't be uploaded via HTTP URL. More information on Sending Files »
     * @param StickerFormatEnum $format Format of the added sticker, must be one of “static” for a .WEBP or .PNG image, “animated” for
     * a .TGS animation, “video” for a WEBM video
     * @param string[] $emoji_list List of 1-20 emoji associated with the sticker
     * @param string[]|null $keywords Optional. List of 0-20 search keywords for the sticker with total length of up to 64 characters.
     * For “regular” and “custom_emoji” stickers only.
     * @param MaskPosition|null $mask_position Optional. Position where the mask should be placed on faces. For “mask” stickers
     * only.
     */
    public function __construct(
        private Filename|Url|string $sticker,
        private StickerFormatEnum $format,
        #[ArrayType('string')] private array $emoji_list,
        #[ArrayType('string')] private array|null $keywords = null,
        private MaskPosition|null $mask_position = null,
    ) {
    }

    public function getSticker(): Filename|Url|string
    {
        return $this->sticker;
    }

    public function setSticker(Filename|Url|string $sticker): InputSticker
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getFormat(): StickerFormatEnum
    {
        return $this->format;
    }

    public function setFormat(StickerFormatEnum $format): InputSticker
    {
        $this->format = $format;
        return $this;
    }

    public function getEmojiList(): array
    {
        return $this->emoji_list;
    }

    public function setEmojiList(array $emoji_list): InputSticker
    {
        $this->emoji_list = $emoji_list;
        return $this;
    }

    public function getKeywords(): array|null
    {
        return $this->keywords;
    }

    public function setKeywords(array|null $keywords): InputSticker
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function getMaskPosition(): MaskPosition|null
    {
        return $this->mask_position;
    }

    public function setMaskPosition(MaskPosition|null $mask_position): InputSticker
    {
        $this->mask_position = $mask_position;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'sticker' => ($this->sticker instanceof Url)
                ? $this->sticker->getUrl()
                : $this->sticker,
            'format' => $this->format->value,
            'emoji_list' => $this->emoji_list,
            'keywords' => $this->keywords,
            'mask_position' => $this->mask_position?->toArray(),
        ];
    }
}
