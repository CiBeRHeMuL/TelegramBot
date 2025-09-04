<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Contains information about the location of a Telegram Business account.
 *
 * @link https://core.telegram.org/bots/api#businesslocation
 */
final class BusinessLocation implements EntityInterface
{
    /**
     * @param string $address Address of the business
     * @param Location|null $location Optional. Location of the business
     *
     * @see https://core.telegram.org/bots/api#location Location
     */
    public function __construct(
        protected string $address,
        protected Location|null $location = null,
    ) {
    }

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
    public function getLocation(): Location|null
    {
        return $this->location;
    }

    /**
     * @param Location|null $location
     *
     * @return BusinessLocation
     */
    public function setLocation(Location|null $location): BusinessLocation
    {
        $this->location = $location;
        return $this;
    }
}
