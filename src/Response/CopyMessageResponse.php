<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\MessageId;

class CopyMessageResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly MessageId|null $messageId = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessageId(): MessageId|null
    {
        return $this->messageId;
    }
}
