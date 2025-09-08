<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a service message about a video chat scheduled in the chat.
 *
 * @link https://core.telegram.org/bots/api#videochatscheduled
 */
final class VideoChatScheduled implements EntityInterface
{
    /**
     * @param int $start_date Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
     */
    public function __construct(
        protected int $start_date,
    ) {}

    /**
     * @return int
     */
    public function getStartDate(): int
    {
        return $this->start_date;
    }

    /**
     * @param int $start_date
     *
     * @return VideoChatScheduled
     */
    public function setStartDate(int $start_date): VideoChatScheduled
    {
        $this->start_date = $start_date;
        return $this;
    }
}
