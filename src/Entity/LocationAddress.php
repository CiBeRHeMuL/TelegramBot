<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CountryCodeEnum;
use stdClass;

/**
 * Describes the physical address of a location.
 *
 * @link https://core.telegram.org/bots/api#locationaddress
 */
class LocationAddress extends AbstractEntity
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
        parent::__construct();
    }

    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    public function setCountryCode(string $country_code): LocationAddress
    {
        $this->country_code = $country_code;
        return $this;
    }

    public function getCity(): string|null
    {
        return $this->city;
    }

    public function setCity(string|null $city): LocationAddress
    {
        $this->city = $city;
        return $this;
    }

    public function getState(): string|null
    {
        return $this->state;
    }

    public function setState(string|null $state): LocationAddress
    {
        $this->state = $state;
        return $this;
    }

    public function getStreet(): string|null
    {
        return $this->street;
    }

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
