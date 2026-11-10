<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatInviteLink;

// region CLASS_CreateChatInviteLinkResponse
class CreateChatInviteLinkResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly ?ChatInviteLink $chatInviteLink = null,
    ) {
        parent::__construct($response);
    }

    public function getChatInviteLink(): ?ChatInviteLink
    {
        return $this->chatInviteLink;
    }
}

// endregion CLASS_CreateChatInviteLinkResponse
