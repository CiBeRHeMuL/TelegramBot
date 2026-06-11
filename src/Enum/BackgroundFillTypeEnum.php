<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of background fill types for Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BackgroundFillType, background, fill, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_BackgroundFillTypeEnum
enum BackgroundFillTypeEnum: string
{
    case Solid = 'solid';
    case Gradient = 'gradient';
    case FreeformGradient = 'freeform_gradient';
}
// endregion ENUM_BackgroundFillTypeEnum
