<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CountryCodeEnum;
use stdClass;

/**
 * Describes the physical address of a location.
 *
 * @link https://core.telegram.org/bots/api#locationaddress
 */
final class LocationAddress implements EntityInterface
{
    /**
     * @param CountryCodeEnum $country_code The two-letter ISO 3166-1 alpha-2 country code of the country where the location is located
     * @param string|null $city Optional. City of the location
     * @param string|null $state Optional. State of the location
     * @param string|null $street Optional. Street address of the location
     */
    public function __construct(
        protected CountryCodeEnum $country_code,
        protected string|null $city = null,
        protected string|null $state = null,
        protected string|null $street = null,
    ) {
    }

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
    public function getCity(): string|null
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     *
     * @return LocationAddress
     */
    public function setCity(string|null $city): LocationAddress
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getState(): string|null
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     *
     * @return LocationAddress
     */
    public function setState(string|null $state): LocationAddress
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreet(): string|null
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     *
     * @return LocationAddress
     */
    public function setStreet(string|null $street): LocationAddress
    {
        $this->street = $street;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'country_code' => $this->country_code->value,
            'city' => $this->city,
            'state' => $this->state,
            'street' => $this->street,
        ];
    }
}
