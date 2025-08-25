<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Gifts;

class GetAvailableGiftsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly Gifts|null $gifts = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getGifts(): Gifts|null
    {
        return $this->gifts;
    }
}
