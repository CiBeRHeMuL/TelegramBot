<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\MaskPositionEnum;
use stdClass;

class MaskPosition extends AbstractEntity
{
    /**
     * @param MaskPositionEnum $point The part of the face relative to which the mask should be placed.
     * @param float $x_shift Shift by X-axis measured in widths of the mask scaled to the face size, from left to right.
     * For example, choosing -1.0 will place the mask just to the left of the default mask position.
     * @param float $y_shift Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom.
     * For example, 1.0 will place the mask just below the default mask position.
     * @param float $scale Mask scaling coefficient. For example, 2.0 means double size.
     */
    public function __construct(
        protected MaskPositionEnum $point,
        protected float $x_shift,
        protected float $y_shift,
        protected float $scale,
    ) {
        parent::__construct();
    }

    public function getPoint(): MaskPositionEnum
    {
        return $this->point;
    }

    public function setPoint(MaskPositionEnum $point): MaskPosition
    {
        $this->point = $point;
        return $this;
    }

    public function getXShift(): float
    {
        return $this->x_shift;
    }

    public function setXShift(float $x_shift): MaskPosition
    {
        $this->x_shift = $x_shift;
        return $this;
    }

    public function getYShift(): float
    {
        return $this->y_shift;
    }

    public function setYShift(float $y_shift): MaskPosition
    {
        $this->y_shift = $y_shift;
        return $this;
    }

    public function getScale(): float
    {
        return $this->scale;
    }

    public function setScale(float $scale): MaskPosition
    {
        $this->scale = $scale;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'point' => $this->point->value,
            'x_shift' => $this->x_shift,
            'y_shift' => $this->y_shift,
            'scale' => $this->scale,
        ];
    }
}
