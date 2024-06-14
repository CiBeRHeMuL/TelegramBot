<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes the opening hours of a business.
 * @link https://core.telegram.org/bots/api#businessopeninghours
 */
class BusinessOpeningHoursInterval extends AbstractEntity
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
        parent::__construct();
    }

    public function getOpeningMinute(): int
    {
        return $this->opening_minute;
    }

    public function setOpeningMinute(int $opening_minute): BusinessOpeningHoursInterval
    {
        $this->opening_minute = $opening_minute;
        return $this;
    }

    public function getClosingMinute(): int
    {
        return $this->closing_minute;
    }

    public function setClosingMinute(int $closing_minute): BusinessOpeningHoursInterval
    {
        $this->closing_minute = $closing_minute;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'opening_minute' => $this->opening_minute,
            'closing_minute' => $this->closing_minute,
        ];
    }
}
