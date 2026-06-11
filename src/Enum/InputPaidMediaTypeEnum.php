<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of input paid media types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputPaidMediaType, input, paid, media, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_InputPaidMediaTypeEnum
enum InputPaidMediaTypeEnum: string
{
    case Photo = 'photo';
    case Video = 'video';
    case LivePhoto = 'live_photo';
}
// endregion ENUM_InputPaidMediaTypeEnum
