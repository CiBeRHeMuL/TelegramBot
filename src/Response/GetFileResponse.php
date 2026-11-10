<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\File;

// region CLASS_GetFileResponse
class GetFileResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly ?File $file = null,
    ) {
        parent::__construct($response);
    }

    public function getFile(): ?File
    {
        return $this->file;
    }
}

// endregion CLASS_GetFileResponse
