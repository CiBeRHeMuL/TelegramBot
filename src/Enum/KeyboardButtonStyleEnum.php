<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of keyboard button styles in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: KeyboardButtonStyle, keyboard, button, style, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_KeyboardButtonStyleEnum
enum KeyboardButtonStyleEnum: string
{
    case Danger = 'danger';
    case Success = 'success';
    case Primary = 'primary';
}
// endregion ENUM_KeyboardButtonStyleEnum
