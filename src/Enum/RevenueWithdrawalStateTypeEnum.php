<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of revenue withdrawal state types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RevenueWithdrawalStateType, revenue, withdrawal, state, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_RevenueWithdrawalStateTypeEnum
enum RevenueWithdrawalStateTypeEnum: string
{
    case Pending = 'pending';
    case Succeeded = 'succeeded';
    case Failed = 'failed';
}
// endregion ENUM_RevenueWithdrawalStateTypeEnum
