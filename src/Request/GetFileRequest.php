<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

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
