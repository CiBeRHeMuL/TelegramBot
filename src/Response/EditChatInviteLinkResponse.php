<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatInviteLink;

class EditChatInviteLinkResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly ChatInviteLink|null $chatInviteLink
    ) {
        parent::__construct($response);
    }

    public function getChatInviteLink(): ChatInviteLink|null
    {
        return $this->chatInviteLink;
    }
}
