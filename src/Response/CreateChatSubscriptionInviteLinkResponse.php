<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatInviteLink;

class CreateChatSubscriptionInviteLinkResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?ChatInviteLink $chatInviteLink = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatInviteLink(): ?ChatInviteLink
    {
        return $this->chatInviteLink;
    }
}
