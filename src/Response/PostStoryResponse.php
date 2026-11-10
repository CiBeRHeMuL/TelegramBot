<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Story;

// region CLASS_PostStoryResponse
class PostStoryResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?Story $story = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getStory(): ?Story
    {
        return $this->story;
    }
}

// endregion CLASS_PostStoryResponse
