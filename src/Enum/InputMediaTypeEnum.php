<?php

namespace AndrewGos\TelegramBot\Enum;

enum InputMediaTypeEnum: string
{
    case Photo = 'photo';
    case Video = 'video';
    case Animation = 'animation';
    case Audio = 'audio';
    case Document = 'document';
}
