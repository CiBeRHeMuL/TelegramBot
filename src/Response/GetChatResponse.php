<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ChatFullInfo;

// region CLASS_GetChatResponse
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

// endregion CLASS_GetChatResponse
