<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Gifts;

// region CLASS_GetAvailableGiftsResponse
class GetAvailableGiftsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?Gifts $gifts = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getGifts(): ?Gifts
    {
        return $this->gifts;
    }
}

// endregion CLASS_GetAvailableGiftsResponse
