<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * Describes the opening hours of a business.
 *
 * @link https://core.telegram.org/bots/api#businessopeninghours
 */
final class BusinessOpeningHours implements EntityInterface
{
    /**
     * @param string $time_zone_name Unique name of the time zone for which the opening hours are defined
     * @param BusinessOpeningHoursInterval[] $opening_hours List of time intervals describing business opening hours
     *
     * @see https://core.telegram.org/bots/api#businessopeninghoursinterval BusinessOpeningHoursInterval
     */
    public function __construct(
        protected string $time_zone_name,
        #[ArrayType(BusinessOpeningHoursInterval::class)]
        protected array $opening_hours,
    ) {
    }

    /**
     * @return string
     */
    public function getTimeZoneName(): string
    {
        return $this->time_zone_name;
    }

    /**
     * @param string $time_zone_name
     *
     * @return BusinessOpeningHours
     */
    public function setTimeZoneName(string $time_zone_name): BusinessOpeningHours
    {
        $this->time_zone_name = $time_zone_name;
        return $this;
    }

    /**
     * @return BusinessOpeningHoursInterval[]
     */
    public function getOpeningHours(): array
    {
        return $this->opening_hours;
    }

    /**
     * @param BusinessOpeningHoursInterval[] $opening_hours
     *
     * @return BusinessOpeningHours
     */
    public function setOpeningHours(array $opening_hours): BusinessOpeningHours
    {
        $this->opening_hours = $opening_hours;
        return $this;
    }
}
