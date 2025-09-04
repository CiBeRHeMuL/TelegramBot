<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use input_message_content
 * to send a message with the specified content instead of the location.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultlocation
 */
#[BuildIf(new FieldIsChecker('type', InlineQueryResultTypeEnum::Location))]
final class InlineQueryResultLocation extends AbstractInlineQueryResult
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
     *
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards Inline keyboard
     * @see https://core.telegram.org/bots/api#inputmessagecontent InputMessageContent
     */
    public function __construct(
        protected string $id,
        protected float $latitude,
        protected float $longitude,
        protected string $title,
        protected int|null $heading = null,
        protected float|null $horizontal_accuracy = null,
        protected AbstractInputMessageContent|null $input_message_content = null,
        protected int|null $live_period = null,
        protected int|null $proximity_alert_radius = null,
        protected InlineKeyboardMarkup|null $reply_markup = null,
        protected int|null $thumbnail_height = null,
        protected Url|null $thumbnail_url = null,
        protected int|null $thumbnail_width = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Location);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return InlineQueryResultLocation
     */
    public function setId(string $id): InlineQueryResultLocation
    {
        $this->id = $id;
        return $this;
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
     * @return InlineQueryResultLocation
     */
    public function setLatitude(float $latitude): InlineQueryResultLocation
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
     * @return InlineQueryResultLocation
     */
    public function setLongitude(float $longitude): InlineQueryResultLocation
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
     * @return InlineQueryResultLocation
     */
    public function setTitle(string $title): InlineQueryResultLocation
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeading(): int|null
    {
        return $this->heading;
    }

    /**
     * @param int|null $heading
     *
     * @return InlineQueryResultLocation
     */
    public function setHeading(int|null $heading): InlineQueryResultLocation
    {
        $this->heading = $heading;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getHorizontalAccuracy(): float|null
    {
        return $this->horizontal_accuracy;
    }

    /**
     * @param float|null $horizontal_accuracy
     *
     * @return InlineQueryResultLocation
     */
    public function setHorizontalAccuracy(float|null $horizontal_accuracy): InlineQueryResultLocation
    {
        $this->horizontal_accuracy = $horizontal_accuracy;
        return $this;
    }

    /**
     * @return AbstractInputMessageContent|null
     */
    public function getInputMessageContent(): AbstractInputMessageContent|null
    {
        return $this->input_message_content;
    }

    /**
     * @param AbstractInputMessageContent|null $input_message_content
     *
     * @return InlineQueryResultLocation
     */
    public function setInputMessageContent(AbstractInputMessageContent|null $input_message_content): InlineQueryResultLocation
    {
        $this->input_message_content = $input_message_content;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLivePeriod(): int|null
    {
        return $this->live_period;
    }

    /**
     * @param int|null $live_period
     *
     * @return InlineQueryResultLocation
     */
    public function setLivePeriod(int|null $live_period): InlineQueryResultLocation
    {
        $this->live_period = $live_period;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getProximityAlertRadius(): int|null
    {
        return $this->proximity_alert_radius;
    }

    /**
     * @param int|null $proximity_alert_radius
     *
     * @return InlineQueryResultLocation
     */
    public function setProximityAlertRadius(int|null $proximity_alert_radius): InlineQueryResultLocation
    {
        $this->proximity_alert_radius = $proximity_alert_radius;
        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    /**
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return InlineQueryResultLocation
     */
    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultLocation
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getThumbnailHeight(): int|null
    {
        return $this->thumbnail_height;
    }

    /**
     * @param int|null $thumbnail_height
     *
     * @return InlineQueryResultLocation
     */
    public function setThumbnailHeight(int|null $thumbnail_height): InlineQueryResultLocation
    {
        $this->thumbnail_height = $thumbnail_height;
        return $this;
    }

    /**
     * @return Url|null
     */
    public function getThumbnailUrl(): Url|null
    {
        return $this->thumbnail_url;
    }

    /**
     * @param Url|null $thumbnail_url
     *
     * @return InlineQueryResultLocation
     */
    public function setThumbnailUrl(Url|null $thumbnail_url): InlineQueryResultLocation
    {
        $this->thumbnail_url = $thumbnail_url;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getThumbnailWidth(): int|null
    {
        return $this->thumbnail_width;
    }

    /**
     * @param int|null $thumbnail_width
     *
     * @return InlineQueryResultLocation
     */
    public function setThumbnailWidth(int|null $thumbnail_width): InlineQueryResultLocation
    {
        $this->thumbnail_width = $thumbnail_width;
        return $this;
    }
}
