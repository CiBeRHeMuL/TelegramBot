<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\AbstractChatMember;

class GetChatMemberResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly AbstractChatMember|null $chatMember,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatMember(): AbstractChatMember|null
    {
        return $this->chatMember;
    }
}
