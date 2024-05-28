<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatFullInfo;

class GetChatResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ChatFullInfo|null $chatFullInfo,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatFullInfo(): ChatFullInfo|null
    {
        return $this->chatFullInfo;
    }
}
