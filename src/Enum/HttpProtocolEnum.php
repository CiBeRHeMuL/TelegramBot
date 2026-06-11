<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of HTTP protocols (http/https) used in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: HttpProtocol, HTTP, protocol, http, https, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value] + getDefaultPort(): int
// region ENUM_HttpProtocolEnum
enum HttpProtocolEnum: string
{
    case Http = 'http';
    case Https = 'https';

    public function getDefaultPort(): int
    {
        return match ($this) {
            self::Http => 80,
            self::Https => 443,
        };
    }
}
// endregion ENUM_HttpProtocolEnum
