<?php

namespace AndrewGos\TelegramBot\Enum;

enum StickerFormatEnum: string
{
    case Static = 'static';
    case Animated = 'animated';
    case Video = 'video';
}
