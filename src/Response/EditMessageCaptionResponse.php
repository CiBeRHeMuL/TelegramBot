<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region CLASS_EditMessageCaptionResponse
class EditMessageCaptionResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly Message|bool|null $message = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessage(): bool|Message|null
    {
        return $this->message;
    }
}

// endregion CLASS_EditMessageCaptionResponse
