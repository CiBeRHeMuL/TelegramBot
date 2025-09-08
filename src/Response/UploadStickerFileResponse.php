<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\File;

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
