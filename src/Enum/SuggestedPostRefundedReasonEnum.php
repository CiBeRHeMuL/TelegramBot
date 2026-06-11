<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of suggested post refunded reasons in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SuggestedPostRefundedReason, suggested, post, refunded, reason, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_SuggestedPostRefundedReasonEnum
enum SuggestedPostRefundedReasonEnum: string
{
    case PostDeleted = 'post_deleted';
    case PaymentRefunded = 'payment_refunded';
}
// endregion ENUM_SuggestedPostRefundedReasonEnum
