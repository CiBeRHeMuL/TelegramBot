<?php

namespace AndrewGos\TelegramBot\Enum;

enum MenuButtonTypeEnum: string
{
    case Commands = 'commands';
    case WebApp = 'web_app';
    case Default = 'default';
}
