<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\MessageId;

// region CLASS_CopyMessageResponse
class CopyMessageResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?MessageId $messageId = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessageId(): ?MessageId
    {
        return $this->messageId;
    }
}

// endregion CLASS_CopyMessageResponse
