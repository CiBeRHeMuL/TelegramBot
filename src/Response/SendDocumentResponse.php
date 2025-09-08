<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

class SendDocumentResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly ?Message $message = null,
    ) {
        parent::__construct($response);
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }
}
