<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BusinessConnection;

// region CLASS_GetBusinessConnectionResponse
class GetBusinessConnectionResponse extends AbstractResponse
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

// endregion CLASS_GetBusinessConnectionResponse
