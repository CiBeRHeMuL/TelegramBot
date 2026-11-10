<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ForumTopic;

// region CLASS_CreateForumTopicResponse
class CreateForumTopicResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?ForumTopic $forumTopic = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getForumTopic(): ?ForumTopic
    {
        return $this->forumTopic;
    }
}

// endregion CLASS_CreateForumTopicResponse
