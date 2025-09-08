<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\MaskPositionEnum;

/**
 * This object describes the position on faces where a mask should be placed by default.
 *
 * @link https://core.telegram.org/bots/api#maskposition
 */
final class MaskPosition implements EntityInterface
{
    /**
     * @param MaskPositionEnum $point The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”,
     * “mouth”, or “chin”.
     * @param float $x_shift Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example,
     * choosing -1.0 will place mask just to the left of the default mask position.
     * @param float $y_shift Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example,
     * 1.0 will place the mask just below the default mask position.
     * @param float $scale Mask scaling coefficient. For example, 2.0 means double size.
     */
    public function __construct(
        protected MaskPositionEnum $point,
        protected float $x_shift,
        protected float $y_shift,
        protected float $scale,
    ) {}

    /**
     * @return MaskPositionEnum
     */
    public function getPoint(): MaskPositionEnum
    {
        return $this->point;
    }

    /**
     * @param MaskPositionEnum $point
     *
     * @return MaskPosition
     */
    public function setPoint(MaskPositionEnum $point): MaskPosition
    {
        $this->point = $point;
        return $this;
    }

    /**
     * @return float
     */
    public function getXShift(): float
    {
        return $this->x_shift;
    }

    /**
     * @param float $x_shift
     *
     * @return MaskPosition
     */
    public function setXShift(float $x_shift): MaskPosition
    {
        $this->x_shift = $x_shift;
        return $this;
    }

    /**
     * @return float
     */
    public function getYShift(): float
    {
        return $this->y_shift;
    }

    /**
     * @param float $y_shift
     *
     * @return MaskPosition
     */
    public function setYShift(float $y_shift): MaskPosition
    {
        $this->y_shift = $y_shift;
        return $this;
    }

    /**
     * @return float
     */
    public function getScale(): float
    {
        return $this->scale;
    }

    /**
     * @param float $scale
     *
     * @return MaskPosition
     */
    public function setScale(float $scale): MaskPosition
    {
        $this->scale = $scale;
        return $this;
    }
}
