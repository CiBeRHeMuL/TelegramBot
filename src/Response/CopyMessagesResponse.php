<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\MessageId;

class CopyMessagesResponse extends AbstractResponse
{
    /**
     * @param RawResponse $rawResponse
     * @param MessageId[]|null $messageIds
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $messageIds = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessageIds(): ?array
    {
        return $this->messageIds;
    }
}
