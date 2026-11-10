<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Story;

// region CLASS_RepostStoryResponse
class RepostStoryResponse extends AbstractResponse
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

// endregion CLASS_RepostStoryResponse
