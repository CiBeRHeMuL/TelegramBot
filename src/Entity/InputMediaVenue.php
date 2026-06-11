<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a venue to be sent.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputmediavenue
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputMediaVenue, Telegram, Bot API, DTO, inputmediavenue
// STRUCTURE: ▶ ┌latitude,longitude,title,address┐ → ◇ foursquare_id → ∑ InputMediaVenue
// region CLASS_InputMediaVenue

/**
 * Represents a venue to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmediavenue
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Venue->value))]
final class InputMediaVenue extends AbstractInputMedia implements InputPollMediaInterface, InputPollOptionMediaInterface
{
    /**
     * @param float       $latitude          Latitude of the location
     * @param float       $longitude         Longitude of the location
     * @param string      $title             Name of the venue
     * @param string      $address           Address of the venue
     * @param string|null $foursquare_id     Optional. Foursquare identifier of the venue
     * @param string|null $foursquare_type   Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
     *                                       “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|null $google_place_id   Optional. Google Places identifier of the venue
     * @param string|null $google_place_type Optional. Google Places type of the venue. (See supported types.)
     *
     * @see https://developers.google.com/places/web-service/supported_types supported types
     */
    public function __construct(
        protected float $latitude,
        protected float $longitude,
        protected string $title,
        protected string $address,
        protected ?string $foursquare_id = null,
        protected ?string $foursquare_type = null,
        protected ?string $google_place_id = null,
        protected ?string $google_place_type = null,
    ) {
        parent::__construct(
            InputMediaTypeEnum::Venue,
        );
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
     * @return InputMediaVenue
     */
    public function setLatitude(float $latitude): InputMediaVenue
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
     * @return InputMediaVenue
     */
    public function setLongitude(float $longitude): InputMediaVenue
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
     * @return InputMediaVenue
     */
    public function setTitle(string $title): InputMediaVenue
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
     * @return InputMediaVenue
     */
    public function setAddress(string $address): InputMediaVenue
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
     * @return InputMediaVenue
     */
    public function setFoursquareId(?string $foursquare_id): InputMediaVenue
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
     * @return InputMediaVenue
     */
    public function setFoursquareType(?string $foursquare_type): InputMediaVenue
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
     * @return InputMediaVenue
     */
    public function setGooglePlaceId(?string $google_place_id): InputMediaVenue
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
     * @return InputMediaVenue
     */
    public function setGooglePlaceType(?string $google_place_type): InputMediaVenue
    {
        $this->google_place_type = $google_place_type;

        return $this;
    }
}

// endregion CLASS_InputMediaVenue
