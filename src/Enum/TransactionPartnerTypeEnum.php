<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_TransactionPartnerTypeEnum
enum TransactionPartnerTypeEnum: string
{
    case Fragment = 'fragment';
    case User = 'user';
    case Chat = 'chat';
    case TelegramAds = 'telegram_ads';
    case Other = 'other';
    case TelegramApi = 'telegram_api';
    case AffiliateProgram = 'affiliate_program';
}
// endregion ENUM_TransactionPartnerTypeEnum
