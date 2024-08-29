<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatInviteLink;

class EditChatSubscriptionInviteLinkResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ChatInviteLink|null $chatInviteLink = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatInviteLink(): ChatInviteLink|null
    {
        return $this->chatInviteLink;
    }
}
