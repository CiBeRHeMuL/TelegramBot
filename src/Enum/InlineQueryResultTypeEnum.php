<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of inline query result types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InlineQueryResultType, inline, query, result, type, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_InlineQueryResultTypeEnum
enum InlineQueryResultTypeEnum: string
{
    case Article = 'article';
    case Audio = 'audio';
    case Contact = 'contact';
    case Game = 'game';
    case Document = 'document';
    case Gif = 'gif';
    case Location = 'location';
    case Mpeg4Gif = 'mpeg4_gif';
    case Photo = 'photo';
    case Venue = 'venue';
    case Video = 'video';
    case Voice = 'voice';
    case Sticker = 'sticker';
}
// endregion ENUM_InlineQueryResultTypeEnum
