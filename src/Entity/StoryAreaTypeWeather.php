<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\StoryAreaTypeTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a story area type that contains weather information.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#storyareatypeweather
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: StoryAreaTypeWeather, Telegram, Bot API, DTO, storyareatypeweather
// STRUCTURE: ▶ ┌type,temperature,emoji,color...┐ → ∑ StoryAreaTypeWeather
// region CLASS_StoryAreaTypeWeather

/**
 * Describes a story area containing weather information. Currently, a story can have up to 3 weather areas.
 *
 * @see https://core.telegram.org/bots/api#storyareatypeweather
 */
#[BuildIf(new FieldIsChecker('type', StoryAreaTypeTypeEnum::Weather->value))]
final class StoryAreaTypeWeather extends AbstractStoryAreaType
{
    /**
     * @param float  $temperature      Temperature, in degree Celsius
     * @param string $emoji            Emoji representing the weather
     * @param int    $background_color A color of the area background in the ARGB format
     */
    public function __construct(
        protected float $temperature,
        protected string $emoji,
        protected int $background_color,
    ) {
        parent::__construct(StoryAreaTypeTypeEnum::Weather);
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @param float $temperature
     *
     * @return StoryAreaTypeWeather
     */
    public function setTemperature(float $temperature): StoryAreaTypeWeather
    {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     *
     * @return StoryAreaTypeWeather
     */
    public function setEmoji(string $emoji): StoryAreaTypeWeather
    {
        $this->emoji = $emoji;

        return $this;
    }

    /**
     * @return int
     */
    public function getBackgroundColor(): int
    {
        return $this->background_color;
    }

    /**
     * @param int $background_color
     *
     * @return StoryAreaTypeWeather
     */
    public function setBackgroundColor(int $background_color): StoryAreaTypeWeather
    {
        $this->background_color = $background_color;

        return $this;
    }
}

// endregion CLASS_StoryAreaTypeWeather
