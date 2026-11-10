<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

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
