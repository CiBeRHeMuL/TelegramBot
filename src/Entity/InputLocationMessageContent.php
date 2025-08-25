<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\AndChecker;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use stdClass;

/**
 * Represents the content of a location message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputmessagecontent content
 * @link https://core.telegram.org/bots/api#inputlocationmessagecontent
 */
#[BuildIf(new AndChecker([
    new FieldCompareChecker('latitude', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('longitude', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('horizontal_accuracy', null, CompareOperatorEnum::StrictNotEqual),
]))]
class InputLocationMessageContent extends AbstractInputMessageContent
{
    /**
     * @param float $latitude Latitude of the location in degrees
     * @param float $longitude Longitude of the location in degrees
     * @param int|null $heading Optional. For live locations, a direction in which the user is moving, in degrees. Must be between
     * 1 and 360 if specified.
     * @param float|null $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|null $live_period Optional. Period in seconds during which the location can be updated, should be between 60 and
     * 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely.
     * @param int|null $proximity_alert_radius Optional. For live locations, a maximum distance for proximity alerts about approaching
     * another chat member, in meters. Must be between 1 and 100000 if specified.
     */
    public function __construct(
        protected float $latitude,
        protected float $longitude,
        protected int|null $heading = null,
        protected float|null $horizontal_accuracy = null,
        protected int|null $live_period = null,
        protected int|null $proximity_alert_radius = null,
    ) {
        parent::__construct();
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
     * @return InputLocationMessageContent
     */
    public function setLatitude(float $latitude): InputLocationMessageContent
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
     * @return InputLocationMessageContent
     */
    public function setLongitude(float $longitude): InputLocationMessageContent
    {
        $this->longitude = $longitude;
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
     * @return InputLocationMessageContent
     */
    public function setHeading(int|null $heading): InputLocationMessageContent
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
     * @return InputLocationMessageContent
     */
    public function setHorizontalAccuracy(float|null $horizontal_accuracy): InputLocationMessageContent
    {
        $this->horizontal_accuracy = $horizontal_accuracy;
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
     * @return InputLocationMessageContent
     */
    public function setLivePeriod(int|null $live_period): InputLocationMessageContent
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
     * @return InputLocationMessageContent
     */
    public function setProximityAlertRadius(int|null $proximity_alert_radius): InputLocationMessageContent
    {
        $this->proximity_alert_radius = $proximity_alert_radius;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'heading' => $this->heading,
            'horizontal_accuracy' => $this->horizontal_accuracy,
            'live_period' => $this->live_period,
            'proximity_alert_radius' => $this->proximity_alert_radius,
        ];
    }
}
