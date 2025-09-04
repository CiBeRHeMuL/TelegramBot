<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes the position of a clickable area within a story.
 *
 * @link https://core.telegram.org/bots/api#storyareaposition
 */
final class StoryAreaPosition implements EntityInterface
{
    /**
     * @param float $x_percentage The abscissa of the area's center, as a percentage of the media width
     * @param float $y_percentage The ordinate of the area's center, as a percentage of the media height
     * @param float $width_percentage The width of the area's rectangle, as a percentage of the media width
     * @param float $height_percentage The height of the area's rectangle, as a percentage of the media height
     * @param float $rotation_angle The clockwise rotation angle of the rectangle, in degrees; 0-360
     * @param float $corner_radius_percentage The radius of the rectangle corner rounding, as a percentage of the media width
     */
    public function __construct(
        protected float $x_percentage,
        protected float $y_percentage,
        protected float $width_percentage,
        protected float $height_percentage,
        protected float $rotation_angle,
        protected float $corner_radius_percentage,
    ) {
    }

    /**
     * @return float
     */
    public function getXPercentage(): float
    {
        return $this->x_percentage;
    }

    /**
     * @param float $x_percentage
     *
     * @return StoryAreaPosition
     */
    public function setXPercentage(float $x_percentage): StoryAreaPosition
    {
        $this->x_percentage = $x_percentage;
        return $this;
    }

    /**
     * @return float
     */
    public function getYPercentage(): float
    {
        return $this->y_percentage;
    }

    /**
     * @param float $y_percentage
     *
     * @return StoryAreaPosition
     */
    public function setYPercentage(float $y_percentage): StoryAreaPosition
    {
        $this->y_percentage = $y_percentage;
        return $this;
    }

    /**
     * @return float
     */
    public function getWidthPercentage(): float
    {
        return $this->width_percentage;
    }

    /**
     * @param float $width_percentage
     *
     * @return StoryAreaPosition
     */
    public function setWidthPercentage(float $width_percentage): StoryAreaPosition
    {
        $this->width_percentage = $width_percentage;
        return $this;
    }

    /**
     * @return float
     */
    public function getHeightPercentage(): float
    {
        return $this->height_percentage;
    }

    /**
     * @param float $height_percentage
     *
     * @return StoryAreaPosition
     */
    public function setHeightPercentage(float $height_percentage): StoryAreaPosition
    {
        $this->height_percentage = $height_percentage;
        return $this;
    }

    /**
     * @return float
     */
    public function getRotationAngle(): float
    {
        return $this->rotation_angle;
    }

    /**
     * @param float $rotation_angle
     *
     * @return StoryAreaPosition
     */
    public function setRotationAngle(float $rotation_angle): StoryAreaPosition
    {
        $this->rotation_angle = $rotation_angle;
        return $this;
    }

    /**
     * @return float
     */
    public function getCornerRadiusPercentage(): float
    {
        return $this->corner_radius_percentage;
    }

    /**
     * @param float $corner_radius_percentage
     *
     * @return StoryAreaPosition
     */
    public function setCornerRadiusPercentage(float $corner_radius_percentage): StoryAreaPosition
    {
        $this->corner_radius_percentage = $corner_radius_percentage;
        return $this;
    }
}
