<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains information about the location of a Telegram Business account.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#business_location
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BusinessLocation, Telegram, Bot API, DTO, business_location
// STRUCTURE: ▶ ┌address,location┐ → ∑ BusinessLocation
// region CLASS_BusinessLocation

/**
 * Contains information about the location of a Telegram Business account.
 *
 * @see https://core.telegram.org/bots/api#businesslocation
 */
final class BusinessLocation implements EntityInterface
{
    /**
     * @param string        $address  Address of the business
     * @param Location|null $location Optional. Location of the business
     *
     * @see https://core.telegram.org/bots/api#location Location
     */
    public function __construct(
        protected string $address,
        protected ?Location $location = null,
    ) {}

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return BusinessLocation
     */
    public function setAddress(string $address): BusinessLocation
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     *
     * @return BusinessLocation
     */
    public function setLocation(?Location $location): BusinessLocation
    {
        $this->location = $location;

        return $this;
    }
}
// endregion CLASS_BusinessLocation
