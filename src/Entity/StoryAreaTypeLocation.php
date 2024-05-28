<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;
use stdClass;

/**
 * Describes a story area pointing to a location. Currently, a story can have up to 10 location areas.
 *
 * @link https://core.telegram.org/bots/api#storyareatypelocation
 */
#[BuildIf(new FieldIsChecker('type', StoryAreaTypeTypeEnum::Location->value))]
class StoryAreaTypeLocation extends AbstractStoryAreaType
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
        protected LocationAddress|null $address = null,
    ) {
        parent::__construct(StoryAreaTypeTypeEnum::Location);
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): StoryAreaTypeLocation
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): StoryAreaTypeLocation
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getAddress(): LocationAddress|null
    {
        return $this->address;
    }

    public function setAddress(LocationAddress|null $address): StoryAreaTypeLocation
    {
        $this->address = $address;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'address' => $this->address?->toArray(),
        ];
    }
}
