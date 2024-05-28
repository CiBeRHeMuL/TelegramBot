<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;
use stdClass;

/**
 * The background is a gradient fill.
 * @link https://core.telegram.org/bots/api#backgroundfillgradient
 */
#[BuildIf(new FieldIsChecker('type', BackgroundFillTypeEnum::Gradient->value))]
class BackgroundFillGradient extends AbstractBackgroundFill
{
    /**
     * @param int $top_color Top color of the gradient in the RGB24 format
     * @param int $bottom_color Bottom color of the gradient in the RGB24 format
     * @param int $rotation_angle Clockwise rotation angle of the background fill in degrees; 0-359
     */
    public function __construct(
        protected int $top_color,
        protected int $bottom_color,
        protected int $rotation_angle,
    ) {
        parent::__construct(BackgroundFillTypeEnum::Gradient);
    }

    public function getTopColor(): int
    {
        return $this->top_color;
    }

    public function setTopColor(int $top_color): BackgroundFillGradient
    {
        $this->top_color = $top_color;
        return $this;
    }

    public function getBottomColor(): int
    {
        return $this->bottom_color;
    }

    public function setBottomColor(int $bottom_color): BackgroundFillGradient
    {
        $this->bottom_color = $bottom_color;
        return $this;
    }

    public function getRotationAngle(): int
    {
        return $this->rotation_angle;
    }

    public function setRotationAngle(int $rotation_angle): BackgroundFillGradient
    {
        $this->rotation_angle = $rotation_angle;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'top_color' => $this->top_color,
            'bottom_color' => $this->bottom_color,
            'rotation_angle' => $this->rotation_angle,
        ];
    }
}
