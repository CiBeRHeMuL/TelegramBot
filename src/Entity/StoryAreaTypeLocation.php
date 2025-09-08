<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;

/**
 * Describes a story area pointing to a location. Currently, a story can have up to 10 location areas.
 *
 * @link https://core.telegram.org/bots/api#storyareatypelocation
 */
#[BuildIf(new FieldIsChecker('type', StoryAreaTypeTypeEnum::Location->value))]
final class StoryAreaTypeLocation extends AbstractStoryAreaType
{
    /**
     * @param float $latitude Location latitude in degrees
     * @param float $longitude Location longitude in degrees
     * @param LocationAddress|null $address Optional. Address of the location
     *
     * @see https://core.telegram.org/bots/api#locationaddress LocationAddress
     */
    public function __construct(
        protected float $latitude,
        protected float $longitude,
        protected ?LocationAddress $address = null,
    ) {
        parent::__construct(StoryAreaTypeTypeEnum::Location);
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
     * @return StoryAreaTypeLocation
     */
    public function setLatitude(float $latitude): StoryAreaTypeLocation
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
     * @return StoryAreaTypeLocation
     */
    public function setLongitude(float $longitude): StoryAreaTypeLocation
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return LocationAddress|null
     */
    public function getAddress(): ?LocationAddress
    {
        return $this->address;
    }

    /**
     * @param LocationAddress|null $address
     *
     * @return StoryAreaTypeLocation
     */
    public function setAddress(?LocationAddress $address): StoryAreaTypeLocation
    {
        $this->address = $address;
        return $this;
    }
}
