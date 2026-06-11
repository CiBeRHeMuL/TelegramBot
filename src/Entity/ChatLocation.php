<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a location to which a chat is connected.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_location
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatLocation, Telegram, Bot API, DTO, chat_location
// STRUCTURE: ▶ ┌location,address┐ → ∑ ChatLocation
// region CLASS_ChatLocation

/**
 * Represents a location to which a chat is connected.
 *
 * @see https://core.telegram.org/bots/api#chatlocation
 */
final class ChatLocation implements EntityInterface
{
    /**
     * @param Location $location The location to which the supergroup is connected. Can't be a live location.
     * @param string   $address  Location address; 1-64 characters, as defined by the chat owner
     *
     * @see https://core.telegram.org/bots/api#location Location
     */
    public function __construct(
        protected Location $location,
        protected string $address,
    ) {}

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
// endregion CLASS_ChatLocation
