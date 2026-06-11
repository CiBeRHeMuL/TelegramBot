<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes the opening hours of a business.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#business_opening_hours
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BusinessOpeningHours, Telegram, Bot API, DTO, business_opening_hours
// STRUCTURE: ▶ ┌time_zone_name┐ → ∑ BusinessOpeningHours
// region CLASS_BusinessOpeningHours

/**
 * Describes the opening hours of a business.
 *
 * @see https://core.telegram.org/bots/api#businessopeninghours
 */
final class BusinessOpeningHours implements EntityInterface
{
    /**
     * @param string                         $time_zone_name Unique name of the time zone for which the opening hours are defined
     * @param BusinessOpeningHoursInterval[] $opening_hours  List of time intervals describing business opening hours
     *
     * @see https://core.telegram.org/bots/api#businessopeninghoursinterval BusinessOpeningHoursInterval
     */
    public function __construct(
        protected string $time_zone_name,
        #[ArrayType(BusinessOpeningHoursInterval::class)]
        protected array $opening_hours,
    ) {}

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
// endregion CLASS_BusinessOpeningHours
