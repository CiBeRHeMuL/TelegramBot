<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CountryCodeEnum;
use stdClass;

/**
 * This object represents a shipping address.
 * @link https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddress implements EntityInterface
{
    /**
     * @param CountryCodeEnum $country_code Two-letter ISO 3166-1 alpha-2 country code
     * @param string $state State, if applicable
     * @param string $city City
     * @param string $street_line1 First line for the address
     * @param string $street_line2 Second line for the address
     * @param string $post_code Address post code
     */
    public function __construct(
        private CountryCodeEnum $country_code,
        private string $state,
        private string $city,
        private string $street_line1,
        private string $street_line2,
        private string $post_code,
    ) {
    }

    public function getCountryCode(): CountryCodeEnum
    {
        return $this->country_code;
    }

    public function setCountryCode(CountryCodeEnum $country_code): ShippingAddress
    {
        $this->country_code = $country_code;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): ShippingAddress
    {
        $this->city = $city;
        return $this;
    }

    public function getStreetLine1(): string
    {
        return $this->street_line1;
    }

    public function setStreetLine1(string $street_line1): ShippingAddress
    {
        $this->street_line1 = $street_line1;
        return $this;
    }

    public function getPostCode(): string
    {
        return $this->post_code;
    }

    public function setPostCode(string $post_code): ShippingAddress
    {
        $this->post_code = $post_code;
        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): ShippingAddress
    {
        $this->state = $state;
        return $this;
    }

    public function getStreetLine2(): string
    {
        return $this->street_line2;
    }

    public function setStreetLine2(string $street_line2): ShippingAddress
    {
        $this->street_line2 = $street_line2;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'country_code' => $this->country_code->value,
            'state' => $this->state,
            'city' => $this->city,
            'street_line1' => $this->street_line1,
            'street_line2' => $this->street_line2,
            'post_code' => $this->post_code,
        ];
    }
}
