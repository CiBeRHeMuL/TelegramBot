<?php

namespace AndrewGos\TelegramBot\Enum;

enum InputMediaTypeEnum: string
{
    case Photo = 'photo';
    case Video = 'video';
    case Animation = 'animation';
    case Audio = 'audio';
    case Document = 'document';
    case LivePhoto = 'live_photo';
    case Location = 'location';
    case Sticker = 'sticker';
    case Venue = 'venue';
}
