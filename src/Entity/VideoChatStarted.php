<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about a video chat started in the chat. Currently holds no information.
 * @link https://core.telegram.org/bots/api#videochatstarted
 */
class VideoChatStarted extends AbstractEntity
{
    public function toArray(): array|stdClass
    {
        return new stdClass();
    }
}
