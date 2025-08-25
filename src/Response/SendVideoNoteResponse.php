<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

class SendVideoNoteResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly Message|null $message = null,
    ) {
        parent::__construct($response);
    }

    public function getMessage(): Message|null
    {
        return $this->message;
    }
}
