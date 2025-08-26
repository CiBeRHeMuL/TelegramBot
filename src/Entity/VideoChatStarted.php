<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about a video chat started in the chat. Currently holds no information.
 * @link https://core.telegram.org/bots/api#videochatstarted
 */
final class VideoChatStarted implements EntityInterface
{
    public function toArray(): array|stdClass
    {
        return new stdClass();
    }
}
