<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatInviteLink;

class RevokeChatInviteLinkResponse extends AbstractResponse
{
    /**
     * @param RawResponse $rawResponse
     * @param ChatInviteLink|null $chatInviteLink
     */
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
