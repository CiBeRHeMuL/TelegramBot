<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a venue.
 * @link https://core.telegram.org/bots/api#venue
 */
class Venue implements EntityInterface
{
    /**
     * @param Location $location Venue location. Can't be a live location.
     * @param string $title Name of the venue.
     * @param string $address Address of the venue.
     * @param string|null $foursquare_id Optional. Foursquare identifier of the venue.
     * @param string|null $foursquare_type Optional. Foursquare type of the venue.
     * (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|null $google_place_id Optional. Google Places identifier of the venue.
     * @param string|null $google_place_type Optional. Google Places type of the venue. (See supported types.)
     *
     * @link https://developers.google.com/places/web-service/supported_types
     */
    public function __construct(
        private Location $location,
        private string $title,
        private string $address,
        private string|null $foursquare_id = null,
        private string|null $foursquare_type = null,
        private string|null $google_place_id = null,
        private string|null $google_place_type = null,
    ) {
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): Venue
    {
        $this->location = $location;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Venue
    {
        $this->title = $title;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): Venue
    {
        $this->address = $address;
        return $this;
    }

    public function getFoursquareId(): string|null
    {
        return $this->foursquare_id;
    }

    public function setFoursquareId(string|null $foursquare_id): Venue
    {
        $this->foursquare_id = $foursquare_id;
        return $this;
    }

    public function getFoursquareType(): string|null
    {
        return $this->foursquare_type;
    }

    public function setFoursquareType(string|null $foursquare_type): Venue
    {
        $this->foursquare_type = $foursquare_type;
        return $this;
    }

    public function getGooglePlaceId(): string|null
    {
        return $this->google_place_id;
    }

    public function setGooglePlaceId(string|null $google_place_id): Venue
    {
        $this->google_place_id = $google_place_id;
        return $this;
    }

    public function getGooglePlaceType(): string|null
    {
        return $this->google_place_type;
    }

    public function setGooglePlaceType(string|null $google_place_type): Venue
    {
        $this->google_place_type = $google_place_type;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'location' => $this->location->toArray(),
            'title' => $this->title,
            'address' => $this->address,
            'foursquare_id' => $this->foursquare_id,
            'foursquare_type' => $this->foursquare_type,
            'google_place_id' => $this->google_place_id,
            'google_place_type' => $this->google_place_type,
        ];
    }
}
