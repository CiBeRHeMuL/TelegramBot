<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use input_message_content to send
 * a message with the specified content instead of the venue.
 * @link https://core.telegram.org/bots/api#inlinequeryresultvenue
 */
#[BuildIf(new FieldIsChecker('type', InlineQueryResultTypeEnum::Venue))]
class InlineQueryResultVenue extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param float $latitude Latitude of the venue location in degrees
     * @param float $longitude Longitude of the venue location in degrees
     * @param string $title Title of the venue
     * @param string $address Address of the venue
     * @param string|null $foursquare_id Optional. Foursquare identifier of the venue if known
     * @param string|null $foursquare_type Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
     * “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|null $google_place_id Optional. Google Places identifier of the venue
     * @param string|null $google_place_type Optional. Google Places type of the venue. (See supported types.)
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * venue
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param int|null $thumbnail_height Optional. Thumbnail height
     * @param Url|null $thumbnail_url Optional. Url of the thumbnail for the result
     * @param int|null $thumbnail_width Optional. Thumbnail width
     */
    public function __construct(
        protected string $id,
        protected float $latitude,
        protected float $longitude,
        protected string $title,
        protected string $address,
        protected string|null $foursquare_id = null,
        protected string|null $foursquare_type = null,
        protected string|null $google_place_id = null,
        protected string|null $google_place_type = null,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
        protected int|null $thumbnail_height = null,
        protected Url|null $thumbnail_url = null,
        protected int|null $thumbnail_width = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Venue);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultVenue
    {
        $this->id = $id;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): InlineQueryResultVenue
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): InlineQueryResultVenue
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): InlineQueryResultVenue
    {
        $this->title = $title;
        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): InlineQueryResultVenue
    {
        $this->address = $address;
        return $this;
    }

    public function getFoursquareId(): string|null
    {
        return $this->foursquare_id;
    }

    public function setFoursquareId(string|null $foursquare_id): InlineQueryResultVenue
    {
        $this->foursquare_id = $foursquare_id;
        return $this;
    }

    public function getFoursquareType(): string|null
    {
        return $this->foursquare_type;
    }

    public function setFoursquareType(string|null $foursquare_type): InlineQueryResultVenue
    {
        $this->foursquare_type = $foursquare_type;
        return $this;
    }

    public function getGooglePlaceId(): string|null
    {
        return $this->google_place_id;
    }

    public function setGooglePlaceId(string|null $google_place_id): InlineQueryResultVenue
    {
        $this->google_place_id = $google_place_id;
        return $this;
    }

    public function getGooglePlaceType(): string|null
    {
        return $this->google_place_type;
    }

    public function setGooglePlaceType(string|null $google_place_type): InlineQueryResultVenue
    {
        $this->google_place_type = $google_place_type;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultVenue
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultVenue
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getThumbnailHeight(): int|null
    {
        return $this->thumbnail_height;
    }

    public function setThumbnailHeight(int|null $thumbnail_height): InlineQueryResultVenue
    {
        $this->thumbnail_height = $thumbnail_height;
        return $this;
    }

    public function getThumbnailUrl(): Url|null
    {
        return $this->thumbnail_url;
    }

    public function setThumbnailUrl(Url|null $thumbnail_url): InlineQueryResultVenue
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    public function getThumbnailWidth(): int|null
    {
        return $this->thumbnail_width;
    }

    public function setThumbnailWidth(int|null $thumbnail_width): InlineQueryResultVenue
    {
        $this->thumbnail_width = $thumbnail_width;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'address' => $this->address,
            'foursquare_id' => $this->foursquare_id,
            'foursquare_type' => $this->foursquare_type,
            'google_place_id' => $this->google_place_id,
            'google_place_type' => $this->google_place_type,
            'input_message_content' => $this->input_message_content?->toArray(),
            'reply_markup' => $this->reply_markup?->toArray(),
            'thumbnail_height' => $this->thumbnail_height,
            'thumbnail_url' => $this->thumbnail_url?->getUrl(),
            'thumbnail_width' => $this->thumbnail_width,
        ];
    }
}
