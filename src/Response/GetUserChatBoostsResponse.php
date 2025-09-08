<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\UserChatBoosts;

class GetUserChatBoostsResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?UserChatBoosts $userChatBoosts = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getUserChatBoosts(): ?UserChatBoosts
    {
        return $this->userChatBoosts;
    }
}
