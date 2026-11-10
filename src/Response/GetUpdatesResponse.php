<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Update;

// region CLASS_GetUpdatesResponse
class GetUpdatesResponse extends AbstractResponse
{
    /**
     * @param RawResponse   $rawResponse
     * @param Update[]|null $updates
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $updates = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getUpdates(): ?array
    {
        return $this->updates;
    }
}

// endregion CLASS_GetUpdatesResponse
