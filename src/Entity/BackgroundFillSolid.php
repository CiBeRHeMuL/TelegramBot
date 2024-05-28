<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;
use stdClass;

/**
 * The background is filled using the selected color.
 * @link https://core.telegram.org/bots/api#backgroundfillsolid
 */
#[BuildIf(new FieldIsChecker('type', BackgroundFillTypeEnum::Solid->value))]
class BackgroundFillSolid extends AbstractBackgroundFill
{
    /**
     * @param int $color The color of the background fill in the RGB24 format
     */
    public function __construct(
        private int $color,
    ) {
        parent::__construct(BackgroundFillTypeEnum::Solid);
    }

    public function getColor(): int
    {
        return $this->color;
    }

    public function setColor(int $color): BackgroundFillSolid
    {
        $this->color = $color;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'color' => $this->color,
        ];
    }
}
