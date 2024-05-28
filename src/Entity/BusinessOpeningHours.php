<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use stdClass;

/**
 * Describes the opening hours of a business.
 */
class BusinessOpeningHours implements EntityInterface
{
    /**
     * @param string $time_zone_name Unique name of the time zone for which the opening hours are defined
     * @param BusinessOpeningHoursInterval[] $opening_hours List of time intervals describing business opening hours
     */
    public function __construct(
        private string $time_zone_name,
        #[ArrayType(BusinessOpeningHoursInterval::class)] private array $opening_hours,
    ) {
    }

    public function getTimeZoneName(): string
    {
        return $this->time_zone_name;
    }

    public function setTimeZoneName(string $time_zone_name): BusinessOpeningHours
    {
        $this->time_zone_name = $time_zone_name;
        return $this;
    }

    public function getOpeningHours(): array
    {
        return $this->opening_hours;
    }

    public function setOpeningHours(array $opening_hours): BusinessOpeningHours
    {
        $this->opening_hours = $opening_hours;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'time_zone_name' => $this->time_zone_name,
            'opening_hours' => array_map(fn(BusinessOpeningHoursInterval $e) => $e->toArray(), $this->opening_hours),
        ];
    }
}
