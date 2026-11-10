<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\AbstractChatMember;

// region CLASS_GetChatMemberResponse
class GetChatMemberResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?AbstractChatMember $chatMember = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatMember(): ?AbstractChatMember
    {
        return $this->chatMember;
    }
}

// endregion CLASS_GetChatMemberResponse
