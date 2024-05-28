<?php

namespace AndrewGos\TelegramBot\Enum;

enum CompareOperatorEnum: string
{
    case Equal = '==';
    case StrictEqual = '===';
    case NotEqual = '!=';
    case StrictNotEqual = '!==';
    case Greater = '>';
    case GreaterOrEqual = '>=';
    case Less = '<';
    case LessOrEqual = '<=';
}
