<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BusinessConnection;

class BusinessConnectionResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?BusinessConnection $connection = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getConnection(): ?BusinessConnection
    {
        return $this->connection;
    }
}
