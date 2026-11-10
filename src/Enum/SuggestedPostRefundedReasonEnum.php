<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_SuggestedPostRefundedReasonEnum
enum SuggestedPostRefundedReasonEnum: string
{
    case PostDeleted = 'post_deleted';
    case PaymentRefunded = 'payment_refunded';
}
// endregion ENUM_SuggestedPostRefundedReasonEnum
