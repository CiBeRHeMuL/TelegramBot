<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a point on the map.
 *
 * @link https://core.telegram.org/bots/api#location
 */
final class Location implements EntityInterface
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
        protected ?float $horizontal_accuracy = null,
        protected ?int $live_period = null,
        protected ?int $heading = null,
        protected ?int $proximity_alert_radius = null,
    ) {}

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
    public function getHorizontalAccuracy(): ?float
    {
        return $this->horizontal_accuracy;
    }

    /**
     * @param float|null $horizontal_accuracy
     *
     * @return Location
     */
    public function setHorizontalAccuracy(?float $horizontal_accuracy): Location
    {
        $this->horizontal_accuracy = $horizontal_accuracy;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLivePeriod(): ?int
    {
        return $this->live_period;
    }

    /**
     * @param int|null $live_period
     *
     * @return Location
     */
    public function setLivePeriod(?int $live_period): Location
    {
        $this->live_period = $live_period;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeading(): ?int
    {
        return $this->heading;
    }

    /**
     * @param int|null $heading
     *
     * @return Location
     */
    public function setHeading(?int $heading): Location
    {
        $this->heading = $heading;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getProximityAlertRadius(): ?int
    {
        return $this->proximity_alert_radius;
    }

    /**
     * @param int|null $proximity_alert_radius
     *
     * @return Location
     */
    public function setProximityAlertRadius(?int $proximity_alert_radius): Location
    {
        $this->proximity_alert_radius = $proximity_alert_radius;
        return $this;
    }
}
