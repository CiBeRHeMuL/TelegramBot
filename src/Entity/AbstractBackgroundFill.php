<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;

// region CLASS_AbstractBackgroundFill
/**
 * This object describes the way a background is filled based on the selected colors.
 *
 * @see https://core.telegram.org/bots/api#backgroundfill
 */
#[AvailableInheritors([
    BackgroundFillSolid::class,
    BackgroundFillGradient::class,
    BackgroundFillFreeformGradient::class,
])]
abstract class AbstractBackgroundFill implements EntityInterface
{
    public function __construct(
        protected readonly BackgroundFillTypeEnum $type,
    ) {}

    public function getType(): BackgroundFillTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractBackgroundFill
