<?php

namespace AndrewGos\TelegramBot\Enum;

enum ChatTypeEnum: string
{
    case Private = 'private';
    case Group = 'group';
    case Supergroup = 'supergroup';
    case Channel = 'channel';
}
