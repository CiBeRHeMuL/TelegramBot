<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

class EditMessageChecklistResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly Message|null $message = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessage(): Message|null
    {
        return $this->message;
    }
}
