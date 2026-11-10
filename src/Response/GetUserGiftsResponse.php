<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\OwnedGifts;

// region CLASS_GetUserGiftsResponse
class GetUserGiftsResponse extends AbstractResponse
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

// endregion CLASS_GetUserGiftsResponse
