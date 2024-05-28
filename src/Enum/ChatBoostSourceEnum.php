<?php

namespace AndrewGos\TelegramBot\Enum;

enum ChatBoostSourceEnum: string
{
    case Premium = 'premium';
    case GiftCode = 'gift_code';
    case Giveaway = 'giveaway';
}
