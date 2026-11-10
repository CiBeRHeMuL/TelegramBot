<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\SentWebAppMessage;

// region CLASS_AnswerWebAppQueryResponse
class AnswerWebAppQueryResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?SentWebAppMessage $sentWebAppMessage = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getSentWebAppMessage(): ?SentWebAppMessage
    {
        return $this->sentWebAppMessage;
    }
}

// endregion CLASS_AnswerWebAppQueryResponse
