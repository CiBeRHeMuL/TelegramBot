<?php

namespace AndrewGos\TelegramBot\Enum;

enum TransactionTypeEnum: string
{
    case InvoicePayment = 'invoice_payment';
    case PaidMediaPayment = 'paid_media_payment';
    case GiftPurchase = 'gift_purchase';
    case PremiumPurchase = 'premium_purchase';
    case BusinessAccountTransfer = 'business_account_transfer';
}
