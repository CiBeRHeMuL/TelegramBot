<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a venue.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#venue
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Venue, Telegram, Bot API, DTO, venue
// STRUCTURE: ▶ ┌location: Location,title,address,foursquare_id,foursquare_type┐ → ◇ ... → ∑ Venue
// region CLASS_Venue

/**
 * This object represents a venue.
 *
 * @see https://core.telegram.org/bots/api#venue
 */
final class Venue implements EntityInterface
{
    /**
     * @param Location    $location          Venue location. Can't be a live location
     * @param string      $title             Name of the venue
     * @param string      $address           Address of the venue
     * @param string|null $foursquare_id     Optional. Foursquare identifier of the venue
     * @param string|null $foursquare_type   Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”,
     *                                       “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|null $google_place_id   Optional. Google Places identifier of the venue
     * @param string|null $google_place_type Optional. Google Places type of the venue. (See supported types.)
     *
     * @see https://core.telegram.org/bots/api#location Location
     * @see https://developers.google.com/places/web-service/supported_types supported types
     */
    public function __construct(
        protected Location $location,
        protected string $title,
        protected string $address,
        protected ?string $foursquare_id = null,
        protected ?string $foursquare_type = null,
        protected ?string $google_place_id = null,
        protected ?string $google_place_type = null,
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
     * @return Venue
     */
    public function setLocation(Location $location): Venue
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Venue
     */
    public function setTitle(string $title): Venue
    {
        $this->title = $title;

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
     * @return Venue
     */
    public function setAddress(string $address): Venue
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquare_id;
    }

    /**
     * @param string|null $foursquare_id
     *
     * @return Venue
     */
    public function setFoursquareId(?string $foursquare_id): Venue
    {
        $this->foursquare_id = $foursquare_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFoursquareType(): ?string
    {
        return $this->foursquare_type;
    }

    /**
     * @param string|null $foursquare_type
     *
     * @return Venue
     */
    public function setFoursquareType(?string $foursquare_type): Venue
    {
        $this->foursquare_type = $foursquare_type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGooglePlaceId(): ?string
    {
        return $this->google_place_id;
    }

    /**
     * @param string|null $google_place_id
     *
     * @return Venue
     */
    public function setGooglePlaceId(?string $google_place_id): Venue
    {
        $this->google_place_id = $google_place_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGooglePlaceType(): ?string
    {
        return $this->google_place_type;
    }

    /**
     * @param string|null $google_place_type
     *
     * @return Venue
     */
    public function setGooglePlaceType(?string $google_place_type): Venue
    {
        $this->google_place_type = $google_place_type;

        return $this;
    }
}

// endregion CLASS_Venue
