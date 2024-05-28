<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Contains information about the location of a Telegram Business account.
 * @link https://core.telegram.org/bots/api#businesslocation
 */
class BusinessLocation implements EntityInterface
{
    /**
     * @param string $address Address of the business
     * @param Location|null $location Optional. Location of the business
     */
    public function __construct(
        private string $address,
        private Location|null $location = null,
    ) {
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): BusinessLocation
    {
        $this->address = $address;
        return $this;
    }

    public function getLocation(): Location|null
    {
        return $this->location;
    }

    public function setLocation(Location|null $location): BusinessLocation
    {
        $this->location = $location;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'address' => $this->address,
            'location' => $this->location?->toArray(),
        ];
    }
}
