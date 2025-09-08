<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatFullInfo;

class GetChatResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?ChatFullInfo $chatFullInfo = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getChatFullInfo(): ?ChatFullInfo
    {
        return $this->chatFullInfo;
    }
}
