<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\OwnedGifts;

class GetBusinessAccountGiftsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?OwnedGifts $gifts = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getGifts(): ?OwnedGifts
    {
        return $this->gifts;
    }
}
