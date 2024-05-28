<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Enum\StickerFormatEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

class UploadStickerFileRequest implements RequestInterface
{
    /**
     * @param Filename|Url $sticker A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See https://core.telegram.org/stickers
     * for technical requirements. More information on Sending Files »
     * @param StickerFormatEnum $sticker_format Format of the sticker, must be one of “static”, “animated”, “video”
     * @param int $user_id User identifier of sticker file owner
     */
    public function __construct(
        private Filename|Url $sticker,
        private StickerFormatEnum $sticker_format,
        private int $user_id,
    ) {
    }

    public function getSticker(): Filename|Url
    {
        return $this->sticker;
    }

    public function setSticker(Filename|Url $sticker): UploadStickerFileRequest
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getStickerFormat(): StickerFormatEnum
    {
        return $this->sticker_format;
    }

    public function setStickerFormat(StickerFormatEnum $sticker_format): UploadStickerFileRequest
    {
        $this->sticker_format = $sticker_format;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): UploadStickerFileRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'sticker' => ($this->sticker instanceof Url)
                ? $this->sticker->getUrl()
                : $this->sticker,
            'sticker_format' => $this->sticker_format->value,
            'user_id' => $this->user_id,
        ];
    }
}
