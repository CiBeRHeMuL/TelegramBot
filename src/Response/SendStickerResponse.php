<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

class SendStickerResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly Message|null $message,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessage(): Message|null
    {
        return $this->message;
    }
}
