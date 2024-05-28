<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\StarTransactions;

class GetStarTransactionsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly StarTransactions|null $starTransactions,
    ) {
        parent::__construct($rawResponse);
    }

    public function getStarTransactions(): StarTransactions|null
    {
        return $this->starTransactions;
    }
}
