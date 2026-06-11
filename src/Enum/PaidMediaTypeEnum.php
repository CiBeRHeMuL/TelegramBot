<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of paid media types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PaidMediaType, paid, media, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_PaidMediaTypeEnum
enum PaidMediaTypeEnum: string
{
    case Preview = 'preview';
    case Photo = 'photo';
    case Video = 'video';
    case LivePhoto = 'live_photo';
}
// endregion ENUM_PaidMediaTypeEnum
