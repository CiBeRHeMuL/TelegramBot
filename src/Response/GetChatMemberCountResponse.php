<?php

namespace AndrewGos\TelegramBot\Response;

class GetChatMemberCountResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly int|null $count,
    ) {
        parent::__construct($rawResponse);
    }

    public function getCount(): int|null
    {
        return $this->count;
    }
}
