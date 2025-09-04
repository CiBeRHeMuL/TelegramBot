<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes an interval of time during which a business is open.
 *
 * @link https://core.telegram.org/bots/api#businessopeninghoursinterval
 */
final class BusinessOpeningHoursInterval implements EntityInterface
{
    /**
     * @param int $opening_minute The minute's sequence number in a week, starting on Monday, marking the start of the time interval
     * during which the business is open; 0 - 7 * 24 * 60
     * @param int $closing_minute The minute's sequence number in a week, starting on Monday, marking the end of the time interval
     * during which the business is open; 0 - 8 * 24 * 60
     */
    public function __construct(
        protected int $opening_minute,
        protected int $closing_minute,
    ) {
    }

    /**
     * @return int
     */
    public function getOpeningMinute(): int
    {
        return $this->opening_minute;
    }

    /**
     * @param int $opening_minute
     *
     * @return BusinessOpeningHoursInterval
     */
    public function setOpeningMinute(int $opening_minute): BusinessOpeningHoursInterval
    {
        $this->opening_minute = $opening_minute;
        return $this;
    }

    /**
     * @return int
     */
    public function getClosingMinute(): int
    {
        return $this->closing_minute;
    }

    /**
     * @param int $closing_minute
     *
     * @return BusinessOpeningHoursInterval
     */
    public function setClosingMinute(int $closing_minute): BusinessOpeningHoursInterval
    {
        $this->closing_minute = $closing_minute;
        return $this;
    }
}
