<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;
use stdClass;

/**
 * Describes a story area containing weather information. Currently, a story can have up to 3 weather areas.
 *
 * @link https://core.telegram.org/bots/api#storyareatypeweather
 */
#[BuildIf(new FieldIsChecker('type', StoryAreaTypeTypeEnum::Weather->value))]
class StoryAreaTypeWeather extends AbstractStoryAreaType
{
    /**
     * @param float $temperature Temperature, in degree Celsius
     * @param string $emoji Emoji representing the weather
     * @param int $background_color A color of the area background in the ARGB format
     */
    public function __construct(
        protected float $temperature,
        protected string $emoji,
        protected int $background_color,
    ) {
        parent::__construct(StoryAreaTypeTypeEnum::Weather);
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): StoryAreaTypeWeather
    {
        $this->temperature = $temperature;
        return $this;
    }

    public function getEmoji(): string
    {
        return $this->emoji;
    }

    public function setEmoji(string $emoji): StoryAreaTypeWeather
    {
        $this->emoji = $emoji;
        return $this;
    }

    public function getBackgroundColor(): int
    {
        return $this->background_color;
    }

    public function setBackgroundColor(int $background_color): StoryAreaTypeWeather
    {
        $this->background_color = $background_color;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'temperature' => $this->temperature,
            'emoji' => $this->emoji,
            'background_color' => $this->background_color,
        ];
    }
}
