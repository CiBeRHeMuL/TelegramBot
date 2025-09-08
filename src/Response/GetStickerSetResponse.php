<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\StickerSet;

class GetStickerSetResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?StickerSet $stickerSet = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getStickerSet(): ?StickerSet
    {
        return $this->stickerSet;
    }
}
