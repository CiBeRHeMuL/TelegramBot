<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a point on the map.
 *
 * @link https://core.telegram.org/bots/api#location
 */
class Location extends AbstractEntity
{
    /**
     * @param float $latitude Latitude as defined by the sender
     * @param float $longitude Longitude as defined by the sender
     * @param float|null $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|null $live_period Optional. Time relative to the message sending date, during which the location can be updated;
     * in seconds. For active live locations only.
     * @param int|null $heading Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
     * @param int|null $proximity_alert_radius Optional. The maximum distance for proximity alerts about approaching another chat
     * member, in meters. For sent live locations only.
     */
    public function __construct(
        protected float $latitude,
        protected float $longitude,
        protected float|null $horizontal_accuracy = null,
        protected int|null $live_period = null,
        protected int|null $heading = null,
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
     * @return Location
     */
    public function setLatitude(float $latitude): Location
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
     * @return Location
     */
    public function setLongitude(float $longitude): Location
    {
        $this->longitude = $longitude;
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
     * @return Location
     */
    public function setHorizontalAccuracy(float|null $horizontal_accuracy): Location
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
     * @return Location
     */
    public function setLivePeriod(int|null $live_period): Location
    {
        $this->live_period = $live_period;
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
     * @return Location
     */
    public function setHeading(int|null $heading): Location
    {
        $this->heading = $heading;
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
     * @return Location
     */
    public function setProximityAlertRadius(int|null $proximity_alert_radius): Location
    {
        $this->proximity_alert_radius = $proximity_alert_radius;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'horizontal_accuracy' => $this->horizontal_accuracy,
            'live_period' => $this->live_period,
            'heading' => $this->heading,
            'proximity_alert_radius' => $this->proximity_alert_radius,
        ];
    }
}
