<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\File;

class GetFileResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly File|null $file,
    ) {
        parent::__construct($response);
    }

    public function getFile(): File|null
    {
        return $this->file;
    }
}
