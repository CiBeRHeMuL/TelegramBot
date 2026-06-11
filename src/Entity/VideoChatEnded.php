<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a video chat ended.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#videochatended
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: VideoChatEnded, Telegram, Bot API, DTO, videochatended
// STRUCTURE: ▶ ┌duration┐ → ∑ VideoChatEnded
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
