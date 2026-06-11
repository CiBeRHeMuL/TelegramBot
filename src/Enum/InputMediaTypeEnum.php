<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of input media types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputMediaType, input, media, type, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_InputMediaTypeEnum
enum InputMediaTypeEnum: string
{
    case Photo = 'photo';
    case Video = 'video';
    case Animation = 'animation';
    case Audio = 'audio';
    case Document = 'document';
    case LivePhoto = 'live_photo';
    case Location = 'location';
    case Sticker = 'sticker';
    case Venue = 'venue';
}
// endregion ENUM_InputMediaTypeEnum
