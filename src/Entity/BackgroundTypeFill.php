<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundTypeTypeEnum;
use stdClass;

/**
 * The background is automatically filled based on the selected colors.
 * @link https://core.telegram.org/bots/api#backgroundtypefill
 */
#[BuildIf(new FieldIsChecker('type', BackgroundTypeTypeEnum::Fill->value))]
class BackgroundTypeFill extends AbstractBackgroundType
{
    /**
     * @param AbstractBackgroundFill $fill The background fill
     * @param int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
     */
    public function __construct(
        protected AbstractBackgroundFill $fill,
        protected int $dark_theme_dimming,
    ) {
        parent::__construct(BackgroundTypeTypeEnum::Fill);
    }

    public function getFill(): AbstractBackgroundFill
    {
        return $this->fill;
    }

    public function setFill(AbstractBackgroundFill $fill): BackgroundTypeFill
    {
        $this->fill = $fill;
        return $this;
    }

    public function getDarkThemeDimming(): int
    {
        return $this->dark_theme_dimming;
    }

    public function setDarkThemeDimming(int $dark_theme_dimming): BackgroundTypeFill
    {
        $this->dark_theme_dimming = $dark_theme_dimming;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'fill' => $this->fill->toArray(),
            'dark_theme_dimming' => $this->dark_theme_dimming,
        ];
    }
}
