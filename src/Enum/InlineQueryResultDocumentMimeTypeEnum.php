<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of MIME types for inline query result documents in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InlineQueryResultDocumentMimeType, inline, query, document, MIME, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_InlineQueryResultDocumentMimeTypeEnum
enum InlineQueryResultDocumentMimeTypeEnum: string
{
    case ApplicationPdf = 'application/pdf';
    case ApplicationZip = 'application/zip';
}
// endregion ENUM_InlineQueryResultDocumentMimeTypeEnum
