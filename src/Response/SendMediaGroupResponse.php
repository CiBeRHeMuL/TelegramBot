<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

class SendMediaGroupResponse extends AbstractResponse
{
    /**
     * @param RawResponse $response
     * @param Message[]|null $messages
     */
    public function __construct(
        RawResponse $response,
        private readonly ?array $messages = null,
    ) {
        parent::__construct($response);
    }

    public function getMessages(): ?array
    {
        return $this->messages;
    }
}
