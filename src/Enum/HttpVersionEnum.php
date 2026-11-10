<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_HttpVersionEnum
enum HttpVersionEnum: string
{
    case Http10 = '1.0';
    case Http11 = '1.1';
    case Http20 = '2.0';
}
// endregion ENUM_HttpVersionEnum
