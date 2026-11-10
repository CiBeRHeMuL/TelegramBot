<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_ReactionTypeEnum
enum ReactionTypeEnum: string
{
    case Emoji = 'emoji';
    case CustomEmoji = 'custom_emoji';
    case Paid = 'paid';
}
// endregion ENUM_ReactionTypeEnum
