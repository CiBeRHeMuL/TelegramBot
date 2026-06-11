<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a video chat scheduled.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#videochatscheduled
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: VideoChatScheduled, Telegram, Bot API, DTO, videochatscheduled
// STRUCTURE: ▶ ┌start_date┐ → ∑ VideoChatScheduled
// region CLASS_VideoChatScheduled

/**
 * This object represents a service message about a video chat scheduled in the chat.
 *
 * @see https://core.telegram.org/bots/api#videochatscheduled
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

// endregion CLASS_VideoChatScheduled
