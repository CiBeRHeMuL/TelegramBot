<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatInviteLink;

// region CLASS_CreateChatSubscriptionInviteLinkResponse
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

// endregion CLASS_CreateChatSubscriptionInviteLinkResponse
