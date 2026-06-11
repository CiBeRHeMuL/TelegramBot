<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\File;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API uploadStickerFile method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: upload sticker file, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ File

// region CLASS_UploadStickerFileResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class UploadStickerFileResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?File $file = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getFile(): ?File
    {
        return $this->file;
    }
}

// endregion CLASS_UploadStickerFileResponse
