<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_MenuButtonTypeEnum
enum MenuButtonTypeEnum: string
{
    case Commands = 'commands';
    case WebApp = 'web_app';
    case Default = 'default';
}
// endregion ENUM_MenuButtonTypeEnum
