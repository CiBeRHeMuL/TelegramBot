<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

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
