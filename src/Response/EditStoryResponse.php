<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Story;

class EditStoryResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly Story|null $story = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getStory(): Story|null
    {
        return $this->story;
    }
}
