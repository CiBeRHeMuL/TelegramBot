<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_ChatBoostSourceEnum
enum ChatBoostSourceEnum: string
{
    case Premium = 'premium';
    case GiftCode = 'gift_code';
    case Giveaway = 'giveaway';
}
// endregion ENUM_ChatBoostSourceEnum
