<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

// region CLASS_GetChatMemberCountResponse
class GetChatMemberCountResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?int $count = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getCount(): ?int
    {
        return $this->count;
    }
}

// endregion CLASS_GetChatMemberCountResponse
