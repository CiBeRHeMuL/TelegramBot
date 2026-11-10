<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region CLASS_GetUserPersonalChatMessagesResponse
class GetUserPersonalChatMessagesResponse extends AbstractResponse
{
    /**
     * @param RawResponse    $rawResponse
     * @param Message[]|null $messages
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $messages = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMessages(): ?array
    {
        return $this->messages;
    }
}

// endregion CLASS_GetUserPersonalChatMessagesResponse
