<?php

namespace AndrewGos\TelegramBot\Enum;

enum TransactionPartnerTypeEnum: string
{
    case Fragment = 'fragment';
    case User = 'user';
    case TelegramAds = 'telegram_ads';
    case Other = 'other';
    case TelegramApi = 'telegram_api';
}
