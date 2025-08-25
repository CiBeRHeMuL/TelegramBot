<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about a video chat ended in the chat.
 *
 * @link https://core.telegram.org/bots/api#videochatended
 */
class VideoChatEnded extends AbstractEntity
{
    /**
     * @param int $duration Video chat duration in seconds
     */
    public function __construct(
        protected int $duration,
    ) {
        parent::__construct();
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     *
     * @return VideoChatEnded
     */
    public function setDuration(int $duration): VideoChatEnded
    {
        $this->duration = $duration;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'duration' => $this->duration,
        ];
    }
}
