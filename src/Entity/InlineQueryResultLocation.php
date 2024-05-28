<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content
 * to send a message with the specified content instead of the location.
 * @link https://core.telegram.org/bots/api#inlinequeryresultlocation
 */
#[BuildIf(new FieldIsChecker('type', InlineQueryResultTypeEnum::Location))]
class InlineQueryResultLocation extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param float $latitude Location latitude in degrees
     * @param float $longitude Location longitude in degrees
     * @param string $title Location title
     * @param int|null $heading Optional. For live locations, a direction in which the user is moving, in degrees. Must be between
     * 1 and 360 if specified.
     * @param float|null $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     * @param AbstractInputMessageContent|null $input_message_content Optional. Content of the message to be sent instead of the
     * location
     * @param int|null $live_period Optional. Period in seconds during which the location can be updated, should be between 60 and
     * 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely.
     * @param int|null $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching
     * another chat member, in meters. Must be between 1 and 100000 if specified.
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     * @param int|null $thumbnail_height Optional. Thumbnail height
     * @param Url|null $thumbnail_url Optional. Url of the thumbnail for the result
     * @param int|null $thumbnail_width Optional. Thumbnail width
     */
    public function __construct(
        private string $id,
        private float $latitude,
        private float $longitude,
        private string $title,
        private int|null $heading = null,
        private float|null $horizontal_accuracy = null,
        private AbstractInputMessageContent|null $input_message_content = null,
        private int|null $live_period = null,
        private int|null $proximity_alert_radius = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
        private int|null $thumbnail_height = null,
        private Url|null $thumbnail_url = null,
        private int|null $thumbnail_width = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Location);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultLocation
    {
        $this->id = $id;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): InlineQueryResultLocation
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): InlineQueryResultLocation
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): InlineQueryResultLocation
    {
        $this->title = $title;
        return $this;
    }

    public function getHeading(): int|null
    {
        return $this->heading;
    }

    public function setHeading(int|null $heading): InlineQueryResultLocation
    {
        $this->heading = $heading;
        return $this;
    }

    public function getHorizontalAccuracy(): float|null
    {
        return $this->horizontal_accuracy;
    }

    public function setHorizontalAccuracy(float|null $horizontal_accuracy): InlineQueryResultLocation
    {
        $this->horizontal_accuracy = $horizontal_accuracy;
        return $this;
    }

    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultLocation
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    public function getLivePeriod(): int|null
    {
        return $this->live_period;
    }

    public function setLivePeriod(int|null $live_period): InlineQueryResultLocation
    {
        $this->live_period = $live_period;
        return $this;
    }

    public function getProximityAlertRadius(): int|null
    {
        return $this->proximity_alert_radius;
    }

    public function setProximityAlertRadius(int|null $proximity_alert_radius): InlineQueryResultLocation
    {
        $this->proximity_alert_radius = $proximity_alert_radius;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultLocation
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getThumbnailHeight(): int|null
    {
        return $this->thumbnail_height;
    }

    public function setThumbnailHeight(int|null $thumbnail_height): InlineQueryResultLocation
    {
        $this->thumbnail_height = $thumbnail_height;
        return $this;
    }

    public function getThumbnailUrl(): Url|null
    {
        return $this->thumbnail_url;
    }

    public function setThumbnailUrl(Url|null $thumbnail_url): InlineQueryResultLocation
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    public function getThumbnailWidth(): int|null
    {
        return $this->thumbnail_width;
    }

    public function setThumbnailWidth(int|null $thumbnail_width): InlineQueryResultLocation
    {
        $this->thumbnail_width = $thumbnail_width;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'heading' => $this->heading,
            'horizontal_accuracy' => $this->horizontal_accuracy,
            'input_message_content' => $this->input_message_content?->toArray(),
            'live_period' => $this->live_period,
            'proximity_alert_radius' => $this->proximity_alert_radius,
            'reply_markup' => $this->reply_markup?->toArray(),
            'thumbnail_height' => $this->thumbnail_height,
            'thumbnail_url' => $this->thumbnail_url?->getUrl(),
            'thumbnail_width' => $this->thumbnail_width,
        ];
    }
}
