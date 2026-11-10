<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_PaidMediaTypeEnum
enum PaidMediaTypeEnum: string
{
    case Preview = 'preview';
    case Photo = 'photo';
    case Video = 'video';
    case LivePhoto = 'live_photo';
}
// endregion ENUM_PaidMediaTypeEnum
