<?php

namespace AndrewGos\TelegramBot\Response;

class GetChatMemberCountResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?int $count = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getCount(): ?int
    {
        return $this->count;
    }
}
