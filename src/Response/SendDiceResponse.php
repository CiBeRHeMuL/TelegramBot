<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

class SendDiceResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly Message|null $message,
    ) {
        parent::__construct($response);
    }

    public function getMessage(): Message|null
    {
        return $this->message;
    }
}
