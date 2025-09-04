<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\AndChecker;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;

/**
 * Represents the content of a venue message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputmessagecontent content
 * @link https://core.telegram.org/bots/api#inputvenuemessagecontent
 */
#[BuildIf(new AndChecker([
    new FieldCompareChecker('latitude', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('longitude', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('title', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('address', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InputVenueMessageContent extends AbstractInputMessageContent
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
     *
     * @see https://developers.google.com/places/web-service/supported_types supported types
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
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     *
     * @return InputVenueMessageContent
     */
    public function setLatitude(float $latitude): InputVenueMessageContent
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     *
     * @return InputVenueMessageContent
     */
    public function setLongitude(float $longitude): InputVenueMessageContent
    {
        $this->longitude = $longitude;
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
     * @return InputVenueMessageContent
     */
    public function setTitle(string $title): InputVenueMessageContent
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
     * @return InputVenueMessageContent
     */
    public function setAddress(string $address): InputVenueMessageContent
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFoursquareId(): string|null
    {
        return $this->foursquare_id;
    }

    /**
     * @param string|null $foursquare_id
     *
     * @return InputVenueMessageContent
     */
    public function setFoursquareId(string|null $foursquare_id): InputVenueMessageContent
    {
        $this->foursquare_id = $foursquare_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFoursquareType(): string|null
    {
        return $this->foursquare_type;
    }

    /**
     * @param string|null $foursquare_type
     *
     * @return InputVenueMessageContent
     */
    public function setFoursquareType(string|null $foursquare_type): InputVenueMessageContent
    {
        $this->foursquare_type = $foursquare_type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGooglePlaceId(): string|null
    {
        return $this->google_place_id;
    }

    /**
     * @param string|null $google_place_id
     *
     * @return InputVenueMessageContent
     */
    public function setGooglePlaceId(string|null $google_place_id): InputVenueMessageContent
    {
        $this->google_place_id = $google_place_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGooglePlaceType(): string|null
    {
        return $this->google_place_type;
    }

    /**
     * @param string|null $google_place_type
     *
     * @return InputVenueMessageContent
     */
    public function setGooglePlaceType(string|null $google_place_type): InputVenueMessageContent
    {
        $this->google_place_type = $google_place_type;
        return $this;
    }
}
