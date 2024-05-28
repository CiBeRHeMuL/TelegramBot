<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\ValueObject\Url;

class ExportChatInviteLinkResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $response,
        private readonly Url|null $inviteLink = null
    ) {
        parent::__construct($response);
    }

    public function getInviteLink(): Url|null
    {
        return $this->inviteLink;
    }
}
