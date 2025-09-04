<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\StickerFormatEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * This object describes a sticker to be added to a sticker set.
 *
 * @link https://core.telegram.org/bots/api#inputsticker
 */
final class InputSticker implements EntityInterface
{
    /**
     * @param Filename|Url|string $sticker The added sticker. Pass a file_id as a String to send a file that already exists on the
     * Telegram servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     * to upload a new file using multipart/form-data under <file_attach_name> name. Animated and video stickers can't be uploaded
     * via HTTP URL. More information on Sending Files »
     * @param StickerFormatEnum $format Format of the added sticker, must be one of “static” for a .WEBP or .PNG image, “animated”
     * for a .TGS animation, “video” for a .WEBM video
     * @param string[] $emoji_list List of 1-20 emoji associated with the sticker
     * @param string[]|null $keywords Optional. List of 0-20 search keywords for the sticker with total length of up to 64 characters.
     * For “regular” and “custom_emoji” stickers only.
     * @param MaskPosition|null $mask_position Optional. Position where the mask should be placed on faces. For “mask” stickers
     * only.
     *
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     * @see https://core.telegram.org/bots/api#maskposition MaskPosition
     */
    public function __construct(
        protected Filename|Url|string $sticker,
        protected StickerFormatEnum $format,
        #[ArrayType('string')]
        protected array $emoji_list,
        #[ArrayType('string')]
        protected array|null $keywords = null,
        protected MaskPosition|null $mask_position = null,
    ) {
    }

    /**
     * @return Filename|Url|string
     */
    public function getSticker(): Filename|Url|string
    {
        return $this->sticker;
    }

    /**
     * @param Filename|Url|string $sticker
     *
     * @return InputSticker
     */
    public function setSticker(Filename|Url|string $sticker): InputSticker
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * @return StickerFormatEnum
     */
    public function getFormat(): StickerFormatEnum
    {
        return $this->format;
    }

    /**
     * @param StickerFormatEnum $format
     *
     * @return InputSticker
     */
    public function setFormat(StickerFormatEnum $format): InputSticker
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getEmojiList(): array
    {
        return $this->emoji_list;
    }

    /**
     * @param string[] $emoji_list
     *
     * @return InputSticker
     */
    public function setEmojiList(array $emoji_list): InputSticker
    {
        $this->emoji_list = $emoji_list;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getKeywords(): array|null
    {
        return $this->keywords;
    }

    /**
     * @param string[]|null $keywords
     *
     * @return InputSticker
     */
    public function setKeywords(array|null $keywords): InputSticker
    {
        $this->keywords = $keywords;
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
     * @return InputSticker
     */
    public function setMaskPosition(MaskPosition|null $mask_position): InputSticker
    {
        $this->mask_position = $mask_position;
        return $this;
    }
}
