<?php

namespace AndrewGos\TelegramBot\Enum;

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
