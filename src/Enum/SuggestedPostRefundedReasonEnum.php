<?php

namespace AndrewGos\TelegramBot\Enum;

enum SuggestedPostRefundedReasonEnum: string
{
    case PostDeleted = 'post_deleted';
    case PaymentRefunded = 'payment_refunded';
}
