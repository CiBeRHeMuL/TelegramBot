<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Enum\StickerFormatEnum;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API uploadStickerFile method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#uploadstickerfile
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Upload, Sticker, File
// STRUCTURE: ▶ ┌sticker + sticker_format + user_id┐ → ◇ construct → ⊕ → ∑ ⟦UploadStickerFileRequest⟧

// region CLASS_UploadStickerFileRequest
/**
 * @see https://core.telegram.org/bots/api#uploadstickerfile
 */
class UploadStickerFileRequest implements RequestInterface
{
    /**
     * @param Filename|Url      $sticker        A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See https://core.telegram.org/stickers
     *                                          for technical requirements. More information on Sending Files »
     * @param StickerFormatEnum $sticker_format Format of the sticker, must be one of “static”, “animated”, “video”
     * @param int               $user_id        User identifier of sticker file owner
     *
     * @see https://core.telegram.org/bots/api#inputfile InputFile
     * @see https://core.telegram.org/stickers https://core.telegram.org/stickers
     * @see https://core.telegram.org/bots/api#sending-files More information on Sending Files »
     */
    public function __construct(
        private Filename|Url $sticker,
        private StickerFormatEnum $sticker_format,
        private int $user_id,
    ) {}

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
}
// endregion CLASS_UploadStickerFileRequest
