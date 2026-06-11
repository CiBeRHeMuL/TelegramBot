<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of HTTP methods used in Telegram Bot API requests.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: HttpMethod, HTTP, method, request, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_HttpMethodEnum
enum HttpMethodEnum: string
{
    case Options = 'OPTIONS';
    case Get = 'GET';
    case Head = 'HEAD';
    case Post = 'POST';
    case Put = 'PUT';
    case Patch = 'PATCH';
    case Delete = 'DELETE';
    case Trace = 'TRACE';
    case Connect = 'CONNECT';
}
// endregion ENUM_HttpMethodEnum
