<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Poll;

class StopPollResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?Poll $poll = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getPoll(): ?Poll
    {
        return $this->poll;
    }
}
