<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Enum\StickerFormatEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * @link https://core.telegram.org/bots/api#setstickersetthumbnail
 */
class SetStickerSetThumbnailRequest implements RequestInterface
{
    /**
     * @param StickerFormatEnum $format Format of the thumbnail, must be one of “static” for a .WEBP or .PNG image, “animated”
     * for a .TGS animation, or “video” for a .WEBM video
     * @param string $name Sticker set name
     * @param int $user_id User identifier of the sticker set owner
     * @param Filename|Url|string|null $thumbnail A .WEBP or .PNG image with the thumbnail, must be up to 128 kilobytes in size and
     * have a width and height of exactly 100px, or a .TGS animation with a thumbnail up to 32 kilobytes in size (see https://core.telegram.org/stickers#animation-requirements
     * for animated sticker technical requirements), or a .WEBM video with the thumbnail up to 32 kilobytes in size; see https://core.telegram.org/stickers#video-requirements
     * for video sticker technical requirements. Pass a file_id as a String to send a file that already exists on the Telegram servers,
     * pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data.
     * More information on Sending Files ». Animated and video sticker set thumbnails can't be uploaded via HTTP URL. If omitted,
     * then the thumbnail is dropped and the first sticker is used as the thumbnail.
     *
     * @see https://core.telegram.org/bots/api#inputfile InputFile
     * @see https://core.telegram.org/stickers#animation-requirements https://core.telegram.org/stickers#animation-requirements
     * @see https://core.telegram.org/stickers#video-requirements https://core.telegram.org/stickers#video-requirements
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     */
    public function __construct(
        private StickerFormatEnum $format,
        private string $name,
        private int $user_id,
        private Filename|Url|string|null $thumbnail = null,
    ) {
    }

    public function getFormat(): StickerFormatEnum
    {
        return $this->format;
    }

    public function setFormat(StickerFormatEnum $format): SetStickerSetThumbnailRequest
    {
        $this->format = $format;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SetStickerSetThumbnailRequest
    {
        $this->name = $name;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): SetStickerSetThumbnailRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getThumbnail(): Filename|Url|string|null
    {
        return $this->thumbnail;
    }

    public function setThumbnail(Filename|Url|string|null $thumbnail): SetStickerSetThumbnailRequest
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'format' => $this->format->value,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'thumbnail' => ($this->thumbnail instanceof Url)
                ? $this->thumbnail->getUrl()
                : $this->thumbnail,
        ];
    }
}
