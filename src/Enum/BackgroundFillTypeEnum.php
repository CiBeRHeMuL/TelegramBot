<?php

namespace AndrewGos\TelegramBot\Enum;

enum BackgroundFillTypeEnum: string
{
    case Solid = 'solid';
    case Gradient = 'gradient';
    case FreeformGradient = 'freeform_gradient';
}
