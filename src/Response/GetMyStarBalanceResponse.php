<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\StarAmount;

// region CLASS_GetMyStarBalanceResponse
class GetMyStarBalanceResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?StarAmount $starAmount = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getStarAmount(): ?StarAmount
    {
        return $this->starAmount;
    }
}

// endregion CLASS_GetMyStarBalanceResponse
