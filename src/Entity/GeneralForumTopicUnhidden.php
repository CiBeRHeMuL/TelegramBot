<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about General forum topic unhidden in the chat. Currently holds no information.
 * @link https://core.telegram.org/bots/api#generalforumtopicunhidden
 */
class GeneralForumTopicUnhidden extends AbstractEntity
{
    public function toArray(): array|stdClass
    {
        return new stdClass();
    }
}
