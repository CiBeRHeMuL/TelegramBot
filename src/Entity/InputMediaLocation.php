<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InputMediaTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a location to be sent.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputmedialocation
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputMediaLocation, Telegram, Bot API, DTO, inputmedialocation
// STRUCTURE: ▶ ┌latitude,longitude┐ → ◇ heading,horizontal_accuracy → ∑ InputMediaLocation
// region CLASS_InputMediaLocation

/**
 * Represents a location to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmedialocation
 */
#[BuildIf(new FieldIsChecker('type', InputMediaTypeEnum::Location->value))]
final class InputMediaLocation extends AbstractInputMedia implements InputPollMediaInterface, InputPollOptionMediaInterface
{
    /**
     * @param float      $latitude            Latitude of the location
     * @param float      $longitude           Longitude of the location
     * @param float|null $horizontal_accuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     */
    public function __construct(
        protected float $latitude,
        protected float $longitude,
        protected ?float $horizontal_accuracy = null,
    ) {
        parent::__construct(
            InputMediaTypeEnum::Location,
        );
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
     * @return InputMediaLocation
     */
    public function setLatitude(float $latitude): InputMediaLocation
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
     * @return InputMediaLocation
     */
    public function setLongitude(float $longitude): InputMediaLocation
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
     * @return InputMediaLocation
     */
    public function setHorizontalAccuracy(?float $horizontal_accuracy): InputMediaLocation
    {
        $this->horizontal_accuracy = $horizontal_accuracy;

        return $this;
    }
}

// endregion CLASS_InputMediaLocation
