<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about a forum topic closed in the chat. Currently holds no information.
 * @link https://core.telegram.org/bots/api#forumtopicclosed
 */
class ForumTopicClosed extends AbstractEntity
{
    public function toArray(): array|stdClass
    {
        return new stdClass();
    }
}
