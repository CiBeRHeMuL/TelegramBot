<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\ForumTopic;

class CreateForumTopicResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ForumTopic|null $forumTopic = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getForumTopic(): ForumTopic|null
    {
        return $this->forumTopic;
    }
}
