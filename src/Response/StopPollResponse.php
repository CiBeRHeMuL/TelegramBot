<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Poll;

class StopPollResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly Poll|null $poll,
    ) {
        parent::__construct($rawResponse);
    }

    public function getPoll(): Poll|null
    {
        return $this->poll;
    }
}
