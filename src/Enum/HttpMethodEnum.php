<?php

namespace AndrewGos\TelegramBot\Enum;

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
