<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of menu button types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MenuButtonType, menu, button, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_MenuButtonTypeEnum
enum MenuButtonTypeEnum: string
{
    case Commands = 'commands';
    case WebApp = 'web_app';
    case Default = 'default';
}
// endregion ENUM_MenuButtonTypeEnum
