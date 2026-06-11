<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CountryCodeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a location address.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#locationaddress
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: LocationAddress, Telegram, Bot API, DTO, locationaddress
// STRUCTURE: ▶ ┌latitude,longitude,address┐ → ∑ LocationAddress
// region CLASS_LocationAddress

/**
 * Describes the physical address of a location.
 *
 * @see https://core.telegram.org/bots/api#locationaddress
 */
final class LocationAddress implements EntityInterface
{
    /**
     * @param CountryCodeEnum $country_code The two-letter ISO 3166-1 alpha-2 country code of the country where the location is located
     * @param string|null     $city         Optional. City of the location
     * @param string|null     $state        Optional. State of the location
     * @param string|null     $street       Optional. Street address of the location
     */
    public function __construct(
        protected CountryCodeEnum $country_code,
        protected ?string $city = null,
        protected ?string $state = null,
        protected ?string $street = null,
    ) {}

    /**
     * @return CountryCodeEnum
     */
    public function getCountryCode(): CountryCodeEnum
    {
        return $this->country_code;
    }

    /**
     * @param CountryCodeEnum $country_code
     *
     * @return LocationAddress
     */
    public function setCountryCode(CountryCodeEnum $country_code): LocationAddress
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     *
     * @return LocationAddress
     */
    public function setCity(?string $city): LocationAddress
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     *
     * @return LocationAddress
     */
    public function setState(?string $state): LocationAddress
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     *
     * @return LocationAddress
     */
    public function setStreet(?string $street): LocationAddress
    {
        $this->street = $street;

        return $this;
    }
}

// endregion CLASS_LocationAddress
