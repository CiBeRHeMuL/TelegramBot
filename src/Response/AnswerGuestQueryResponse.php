<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\SentGuestMessage;

class AnswerGuestQueryResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?SentGuestMessage $sentGuestMessage = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getSentGuestMessage(): ?SentGuestMessage
    {
        return $this->sentGuestMessage;
    }
}
