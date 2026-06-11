<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose The background is a gradient fill.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#backgroundfillgradient
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BackgroundFillGradient, Telegram Bot API, background, fill, gradient, extends AbstractBackgroundFill, DTO
// STRUCTURE: ▶ ┌top_color, bottom_color, rotation_angle┐

// region CLASS_BackgroundFillGradient [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * The background is a gradient fill.
 *
 * @see https://core.telegram.org/bots/api#backgroundfillgradient
 */
#[BuildIf(new FieldIsChecker('type', BackgroundFillTypeEnum::Gradient->value))]
final class BackgroundFillGradient extends AbstractBackgroundFill
{
    /**
     * @param int $top_color      Top color of the gradient in the RGB24 format
     * @param int $bottom_color   Bottom color of the gradient in the RGB24 format
     * @param int $rotation_angle Clockwise rotation angle of the background fill in degrees; 0-359
     */
    public function __construct(
        protected int $top_color,
        protected int $bottom_color,
        protected int $rotation_angle,
    ) {
        parent::__construct(BackgroundFillTypeEnum::Gradient);
    }

    /**
     * @return int
     */
    public function getTopColor(): int
    {
        return $this->top_color;
    }

    /**
     * @param int $top_color
     *
     * @return BackgroundFillGradient
     */
    public function setTopColor(int $top_color): BackgroundFillGradient
    {
        $this->top_color = $top_color;

        return $this;
    }

    /**
     * @return int
     */
    public function getBottomColor(): int
    {
        return $this->bottom_color;
    }

    /**
     * @param int $bottom_color
     *
     * @return BackgroundFillGradient
     */
    public function setBottomColor(int $bottom_color): BackgroundFillGradient
    {
        $this->bottom_color = $bottom_color;

        return $this;
    }

    /**
     * @return int
     */
    public function getRotationAngle(): int
    {
        return $this->rotation_angle;
    }

    /**
     * @param int $rotation_angle
     *
     * @return BackgroundFillGradient
     */
    public function setRotationAngle(int $rotation_angle): BackgroundFillGradient
    {
        $this->rotation_angle = $rotation_angle;

        return $this;
    }
}
// endregion CLASS_BackgroundFillGradient
