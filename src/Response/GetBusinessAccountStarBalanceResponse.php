<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\StarAmount;

// region CLASS_GetBusinessAccountStarBalanceResponse
class GetBusinessAccountStarBalanceResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?StarAmount $amount = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getAmount(): ?StarAmount
    {
        return $this->amount;
    }
}

// endregion CLASS_GetBusinessAccountStarBalanceResponse
