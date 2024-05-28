<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a point on the map.
 * @link https://core.telegram.org/bots/api#location
 */
class Location implements EntityInterface
{
    /**
     * @param float $latitude Latitude as defined by sender
     * @param float $longitude Longitude as defined by sender
     * @param float|null $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|null $live_period Time relative to the message sending date, during which the location can be updated; in seconds.
     * For active live locations only.
     * @param int|null $heading The direction in which user is moving, in degrees; 1-360. For active live locations only.
     * @param int|null $proximity_alert_radius The maximum distance for proximity alerts about approaching another chat member, in meters.
     * For sent live locations only.
     */
    public function __construct(
        private float $latitude,
        private float $longitude,
        private float|null $horizontal_accuracy = null,
        private int|null $live_period = null,
        private int|null $heading = null,
        private int|null $proximity_alert_radius = null,
    ) {
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): Location
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): Location
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getHorizontalAccuracy(): float|null
    {
        return $this->horizontal_accuracy;
    }

    public function setHorizontalAccuracy(float|null $horizontal_accuracy): Location
    {
        $this->horizontal_accuracy = $horizontal_accuracy;
        return $this;
    }

    public function getLivePeriod(): int|null
    {
        return $this->live_period;
    }

    public function setLivePeriod(int|null $live_period): Location
    {
        $this->live_period = $live_period;
        return $this;
    }

    public function getHeading(): int|null
    {
        return $this->heading;
    }

    public function setHeading(int|null $heading): Location
    {
        $this->heading = $heading;
        return $this;
    }

    public function getProximityAlertRadius(): int|null
    {
        return $this->proximity_alert_radius;
    }

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
