<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_StickerTypeEnum
enum StickerTypeEnum: string
{
    case Regular = 'regular';
    case Mask = 'mask';
    case CustomEmoji = 'custom_emoji';
}
// endregion ENUM_StickerTypeEnum
