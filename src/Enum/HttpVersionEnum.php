<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of HTTP version identifiers used in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: HttpVersion, HTTP, version, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_HttpVersionEnum
enum HttpVersionEnum: string
{
    case Http10 = '1.0';
    case Http11 = '1.1';
    case Http20 = '2.0';
}
// endregion ENUM_HttpVersionEnum
