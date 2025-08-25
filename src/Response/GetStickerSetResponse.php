<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\StickerSet;

class GetStickerSetResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly StickerSet|null $stickerSet = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getStickerSet(): StickerSet|null
    {
        return $this->stickerSet;
    }
}
