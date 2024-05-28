<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Represents a location to which a chat is connected.
 * @link https://core.telegram.org/bots/api#chatlocation
 */
class ChatLocation extends AbstractEntity
{
    /**
     * @param Location $location The location to which the supergroup is connected. Can't be a live location.
     * @param string $address
     */
    public function __construct(
        protected Location $location,
        protected string $address,
    ) {
        parent::__construct();
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): ChatLocation
    {
        $this->location = $location;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): ChatLocation
    {
        $this->address = $address;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'location' => $this->location->toArray(),
            'address' => $this->address,
        ];
    }
}
