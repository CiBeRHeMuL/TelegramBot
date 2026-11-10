<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_InputPaidMediaTypeEnum
enum InputPaidMediaTypeEnum: string
{
    case Photo = 'photo';
    case Video = 'video';
    case LivePhoto = 'live_photo';
}
// endregion ENUM_InputPaidMediaTypeEnum
