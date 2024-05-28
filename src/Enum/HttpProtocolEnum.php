<?php

namespace AndrewGos\TelegramBot\Enum;

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
