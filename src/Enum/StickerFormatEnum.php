<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of sticker formats in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: StickerFormat, sticker, format, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_StickerFormatEnum
enum StickerFormatEnum: string
{
    case Static = 'static';
    case Animated = 'animated';
    case Video = 'video';
}
// endregion ENUM_StickerFormatEnum
