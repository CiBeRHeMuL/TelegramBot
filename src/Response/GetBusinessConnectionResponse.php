<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BusinessConnection;

class GetBusinessConnectionResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly BusinessConnection|null $connection,
    ) {
        parent::__construct($rawResponse);
    }

    public function getConnection(): BusinessConnection|null
    {
        return $this->connection;
    }
}
