<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\UniqueGift;

class GetUniqueGiftResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?UniqueGift $uniqueGift = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getUniqueGift(): ?UniqueGift
    {
        return $this->uniqueGift;
    }
}
