<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Represents a location to which a chat is connected.
 *
 * @link https://core.telegram.org/bots/api#chatlocation
 */
final class ChatLocation implements EntityInterface
{
    /**
     * @param Location $location The location to which the supergroup is connected. Can't be a live location.
     * @param string $address Location address; 1-64 characters, as defined by the chat owner
     *
     * @see https://core.telegram.org/bots/api#location Location
     */
    public function __construct(
        protected Location $location,
        protected string $address,
    ) {
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     *
     * @return ChatLocation
     */
    public function setLocation(Location $location): ChatLocation
    {
        $this->location = $location;
        return $this;
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
     * @return ChatLocation
     */
    public function setAddress(string $address): ChatLocation
    {
        $this->address = $address;
        return $this;
    }
}
