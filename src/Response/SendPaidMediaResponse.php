<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region CLASS_SendPaidMediaResponse
class SendPaidMediaResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?Message $message = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }
}

// endregion CLASS_SendPaidMediaResponse
