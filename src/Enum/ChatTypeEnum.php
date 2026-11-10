<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_ChatTypeEnum
enum ChatTypeEnum: string
{
    case Private = 'private';
    case Group = 'group';
    case Supergroup = 'supergroup';
    case Channel = 'channel';
}
// endregion ENUM_ChatTypeEnum
