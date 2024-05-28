<?php

namespace AndrewGos\TelegramBot\Enum;

enum StickerTypeEnum: string
{
    case Regular = 'regular';
    case Mask = 'mask';
    case CustomEmoji = 'custom_emoji';
}
