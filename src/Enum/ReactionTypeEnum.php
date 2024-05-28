<?php

namespace AndrewGos\TelegramBot\Enum;

enum ReactionTypeEnum: string
{
    case Emoji = 'emoji';
    case CustomEmoji = 'custom_emoji';
    case Paid = 'paid';
}
