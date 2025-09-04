<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CountryCodeEnum;

/**
 * This object represents a shipping address.
 *
 * @link https://core.telegram.org/bots/api#shippingaddress
 */
final class ShippingAddress implements EntityInterface
{
    /**
     * @param CountryCodeEnum $country_code Two-letter ISO 3166-1 alpha-2 country code
     * @param string $state State, if applicable
     * @param string $city City
     * @param string $street_line1 First line for the address
     * @param string $street_line2 Second line for the address
     * @param string $post_code Address post code
     *
     * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2 ISO 3166-1 alpha-2
     */
    public function __construct(
        protected CountryCodeEnum $country_code,
        protected string $state,
        protected string $city,
        protected string $street_line1,
        protected string $street_line2,
        protected string $post_code,
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
     * @return ShippingAddress
     */
    public function setCountryCode(CountryCodeEnum $country_code): ShippingAddress
    {
        $this->country_code = $country_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return ShippingAddress
     */
    public function setState(string $state): ShippingAddress
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return ShippingAddress
     */
    public function setCity(string $city): ShippingAddress
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetLine1(): string
    {
        return $this->street_line1;
    }

    /**
     * @param string $street_line1
     *
     * @return ShippingAddress
     */
    public function setStreetLine1(string $street_line1): ShippingAddress
    {
        $this->street_line1 = $street_line1;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetLine2(): string
    {
        return $this->street_line2;
    }

    /**
     * @param string $street_line2
     *
     * @return ShippingAddress
     */
    public function setStreetLine2(string $street_line2): ShippingAddress
    {
        $this->street_line2 = $street_line2;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->post_code;
    }

    /**
     * @param string $post_code
     *
     * @return ShippingAddress
     */
    public function setPostCode(string $post_code): ShippingAddress
    {
        $this->post_code = $post_code;
        return $this;
    }
}
