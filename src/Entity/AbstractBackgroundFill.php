<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\AvailableExtensions;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;

/**
 * This object describes the way a background is filled based on the selected colors.
 * @link https://core.telegram.org/bots/api#backgroundfill
 */
#[AvailableExtensions([
    BackgroundFillSolid::class,
    BackgroundFillGradient::class,
    BackgroundFillFreeformGradient::class,
])]
abstract class AbstractBackgroundFill implements EntityInterface
{
    public function __construct(
        protected readonly BackgroundFillTypeEnum $type,
    ) {
    }

    public function getType(): BackgroundFillTypeEnum
    {
        return $this->type;
    }
}
