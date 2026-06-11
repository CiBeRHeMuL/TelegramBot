<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of HTTP content types used in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ContentType, HTTP, content-type, MIME, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_ContentTypeEnum
enum ContentTypeEnum: string
{
    case ApplicationJson = 'application/json';
    case ApplicationXml = 'application/xml';
    case ApplicationFormUrlencoded = 'application/x-www-form-urlencoded';
    case MultipartFormData = 'multipart/form-data';
}
// endregion ENUM_ContentTypeEnum
