<?php

namespace AndrewGos\TelegramBot\Enum;

enum HttpVersionEnum: string
{
    case Http10 = '1.0';
    case Http11 = '1.1';
    case Http20 = '2.0';
}
