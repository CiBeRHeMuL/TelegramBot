<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of MIME types for inline query result thumbnails in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InlineQueryResultThumbnailMimeType, inline, query, thumbnail, MIME, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_InlineQueryResultThumbnailMimeTypeEnum
enum InlineQueryResultThumbnailMimeTypeEnum: string
{
    case ImageJpeg = 'image/jpeg';
    case ImageGif = 'image/gif';
    case VideoMp4 = 'video/mp4';
}
// endregion ENUM_InlineQueryResultThumbnailMimeTypeEnum
