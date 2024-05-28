<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\StarAmount;

class GetBusinessAccountStarBalanceResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly StarAmount|null $amount,
    ) {
        parent::__construct($rawResponse);
    }

    public function getAmount(): StarAmount|null
    {
        return $this->amount;
    }
}
