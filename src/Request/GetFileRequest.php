<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getFile method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getfile
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, File
// STRUCTURE: ▶ ┌file_id┐ → ◇ construct → ⊕ → ∑ ⟦GetFileRequest⟧

// region CLASS_GetFileRequest
/**
 * @see https://core.telegram.org/bots/api#getfile
 */
class GetFileRequest implements RequestInterface
{
    /**
     * @param string $file_id File identifier to get information about
     */
    public function __construct(
        private string $file_id,
    ) {}

    public function getFileId(): string
    {
        return $this->file_id;
    }

    public function setFileId(string $file_id): GetFileRequest
    {
        $this->file_id = $file_id;

        return $this;
    }
}
// endregion CLASS_GetFileRequest
