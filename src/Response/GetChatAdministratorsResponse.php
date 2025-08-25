<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\AbstractChatMember;

class GetChatAdministratorsResponse extends AbstractResponse
{
    /**
     * @param RawResponse $rawResponse
     * @param AbstractChatMember[]|null $chatMembers
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly array|null $chatMembers = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatMembers(): array|null
    {
        return $this->chatMembers;
    }
}
