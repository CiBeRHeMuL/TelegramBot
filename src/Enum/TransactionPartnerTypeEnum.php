<?php

namespace AndrewGos\TelegramBot\Enum;

enum TransactionPartnerTypeEnum: string
{
    case Fragment = 'fragment';
    case User = 'user';
    case Other = 'other';
}
