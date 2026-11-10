<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_VideoChatEnded
/**
 * This object represents a service message about a video chat ended in the chat.
 *
 * @see https://core.telegram.org/bots/api#videochatended
 */
final class VideoChatEnded implements EntityInterface
{
    /**
     * @param int $duration Video chat duration in seconds
     */
    public function __construct(
        protected int $duration,
    ) {}

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
}

// endregion CLASS_VideoChatEnded
