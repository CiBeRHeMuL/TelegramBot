<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\AndChecker;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use stdClass;

/**
 * Represents the content of a venue message to be sent as the result of an inline query.
 * @link https://core.telegram.org/bots/api#inputvenuemessagecontent
 */
#[BuildIf(new AndChecker([
    new FieldCompareChecker('latitude', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('longitude', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('title', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('address', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InputVenueMessageContent extends AbstractInputMessageContent
{
    /**
     * @param float $latitude Latitude of the venue in degrees
     * @param float $longitude Longitude of the venue in degrees
     * @param string $title Name of the venue
     * @param string $address Address of the venue
     * @param string|null $foursquare_id Optional. Foursquare identifier of the venue, if known
     * @param string|null $foursquare_type Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
     * “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|null $google_place_id Optional. Google Places identifier of the venue
     * @param string|null $google_place_type Optional. Google Places type of the venue. (See supported types.)
     */
    public function __construct(
        protected float $latitude,
        protected float $longitude,
        protected string $title,
        protected string $address,
        protected string|null $foursquare_id = null,
        protected string|null $foursquare_type = null,
        protected string|null $google_place_id = null,
        protected string|null $google_place_type = null,
    ) {
        parent::__construct();
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): InputVenueMessageContent
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): InputVenueMessageContent
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): InputVenueMessageContent
    {
        $this->title = $title;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): InputVenueMessageContent
    {
        $this->address = $address;
        return $this;
    }

    public function getFoursquareId(): string|null
    {
        return $this->foursquare_id;
    }

    public function setFoursquareId(string|null $foursquare_id): InputVenueMessageContent
    {
        $this->foursquare_id = $foursquare_id;
        return $this;
    }

    public function getFoursquareType(): string|null
    {
        return $this->foursquare_type;
    }

    public function setFoursquareType(string|null $foursquare_type): InputVenueMessageContent
    {
        $this->foursquare_type = $foursquare_type;
        return $this;
    }

    public function getGooglePlaceId(): string|null
    {
        return $this->google_place_id;
    }

    public function setGooglePlaceId(string|null $google_place_id): InputVenueMessageContent
    {
        $this->google_place_id = $google_place_id;
        return $this;
    }

    public function getGooglePlaceType(): string|null
    {
        return $this->google_place_type;
    }

    public function setGooglePlaceType(string|null $google_place_type): InputVenueMessageContent
    {
        $this->google_place_type = $google_place_type;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'address' => $this->address,
            'foursquare_id' => $this->foursquare_id,
            'foursquare_type' => $this->foursquare_type,
            'google_place_id' => $this->google_place_id,
            'google_place_type' => $this->google_place_type,
        ];
    }
}
