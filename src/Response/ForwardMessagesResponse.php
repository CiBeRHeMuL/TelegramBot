<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\MessageId;

class ForwardMessagesResponse extends AbstractResponse
{
    /**
     * @param RawResponse $rawResponse
     * @param MessageId[]|null $messageIds
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly array|null $messageIds
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessageIds(): array|null
    {
        return $this->messageIds;
    }
}
