<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of MIME types for inline query result videos in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InlineQueryResultVideoMimeType, inline, query, video, MIME, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_InlineQueryResultVideoMimeTypeEnum
enum InlineQueryResultVideoMimeTypeEnum: string
{
    case TextHtml = 'text/html';
    case VideoMp4 = 'video/mp4';
}
// endregion ENUM_InlineQueryResultVideoMimeTypeEnum
