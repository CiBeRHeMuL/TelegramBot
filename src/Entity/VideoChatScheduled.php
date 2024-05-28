<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 * @link https://core.telegram.org/bots/api#videochatscheduled
 */
class VideoChatScheduled implements EntityInterface
{
    /**
     * @param int $start_date Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
     */
    public function __construct(
        private int $start_date
    ) {
    }

    public function getStartDate(): int
    {
        return $this->start_date;
    }

    public function setStartDate(int $start_date): VideoChatScheduled
    {
        $this->start_date = $start_date;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'start_date' => $this->start_date,
        ];
    }
}
