<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region CLASS_SendMediaGroupResponse
class SendMediaGroupResponse extends AbstractResponse
{
    /**
     * @param RawResponse    $response
     * @param Message[]|null $messages
     */
    public function __construct(
        RawResponse $response,
        private readonly ?array $messages = null,
    ) {
        parent::__construct($response);
    }

    public function getMessages(): ?array
    {
        return $this->messages;
    }
}

// endregion CLASS_SendMediaGroupResponse
