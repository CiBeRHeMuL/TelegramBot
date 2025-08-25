<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\SentWebAppMessage;

class AnswerWebAppQueryResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly SentWebAppMessage|null $sentWebAppMessage = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getSentWebAppMessage(): SentWebAppMessage|null
    {
        return $this->sentWebAppMessage;
    }
}
