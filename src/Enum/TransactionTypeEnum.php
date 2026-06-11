<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of transaction types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TransactionType, transaction, type, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_TransactionTypeEnum
enum TransactionTypeEnum: string
{
    case InvoicePayment = 'invoice_payment';
    case PaidMediaPayment = 'paid_media_payment';
    case GiftPurchase = 'gift_purchase';
    case PremiumPurchase = 'premium_purchase';
    case BusinessAccountTransfer = 'business_account_transfer';
}
// endregion ENUM_TransactionTypeEnum
