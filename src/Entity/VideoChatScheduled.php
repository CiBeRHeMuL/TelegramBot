<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 * @link https://core.telegram.org/bots/api#videochatscheduled
 */
class VideoChatScheduled extends AbstractEntity
{
    /**
     * @param int $start_date Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
     */
    public function __construct(
        protected int $start_date,
    ) {
        parent::__construct();
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
