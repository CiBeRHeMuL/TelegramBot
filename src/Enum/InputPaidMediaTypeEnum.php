<?php

namespace AndrewGos\TelegramBot\Enum;

enum InputPaidMediaTypeEnum: string
{
    case Photo = 'photo';
    case Video = 'video';
    case LivePhoto = 'live_photo';
}
