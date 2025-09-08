<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\StarTransactions;

class GetStarTransactionsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?StarTransactions $starTransactions = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getStarTransactions(): ?StarTransactions
    {
        return $this->starTransactions;
    }
}
