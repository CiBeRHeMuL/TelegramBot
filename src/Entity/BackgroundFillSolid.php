<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;
use stdClass;

/**
 * The background is filled using the selected color.
 *
 * @link https://core.telegram.org/bots/api#backgroundfillsolid
 */
#[BuildIf(new FieldIsChecker('type', BackgroundFillTypeEnum::Solid->value))]
class BackgroundFillSolid extends AbstractBackgroundFill
{
    /**
     * @param int $color The color of the background fill in the RGB24 format
     */
    public function __construct(
        protected int $color,
    ) {
        parent::__construct(BackgroundFillTypeEnum::Solid);
    }

    /**
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    /**
     * @param int $color
     *
     * @return BackgroundFillSolid
     */
    public function setColor(int $color): BackgroundFillSolid
    {
        $this->color = $color;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'color' => $this->color,
            'type' => $this->type->value,
        ];
    }
}
