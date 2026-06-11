<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of transaction partner types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TransactionPartnerType, transaction, partner, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
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
