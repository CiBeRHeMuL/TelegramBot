<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_BackgroundFillTypeEnum
enum BackgroundFillTypeEnum: string
{
    case Solid = 'solid';
    case Gradient = 'gradient';
    case FreeformGradient = 'freeform_gradient';
}
// endregion ENUM_BackgroundFillTypeEnum
