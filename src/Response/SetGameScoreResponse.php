<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

class SetGameScoreResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly Message|bool|null $message,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessage(): bool|Message|null
    {
        return $this->message;
    }
}
