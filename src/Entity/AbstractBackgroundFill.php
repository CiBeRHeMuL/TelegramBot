<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;

/**
 * This object describes the way a background is filled based on the selected colors.
 * @link https://core.telegram.org/bots/api#backgroundfill
 */
#[AvailableInheritors([
    BackgroundFillSolid::class,
    BackgroundFillGradient::class,
    BackgroundFillFreeformGradient::class,
])]
abstract class AbstractBackgroundFill extends AbstractEntity
{
    public function __construct(
        protected readonly BackgroundFillTypeEnum $type,
    ) {
        parent::__construct();
    }

    public function getType(): BackgroundFillTypeEnum
    {
        return $this->type;
    }
}
