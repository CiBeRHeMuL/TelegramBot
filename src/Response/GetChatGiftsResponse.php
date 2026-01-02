<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\OwnedGifts;

class GetChatGiftsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?OwnedGifts $ownedGifts = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getOwnedGifts(): ?OwnedGifts
    {
        return $this->ownedGifts;
    }
}
