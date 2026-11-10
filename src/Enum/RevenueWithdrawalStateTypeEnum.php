<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_RevenueWithdrawalStateTypeEnum
enum RevenueWithdrawalStateTypeEnum: string
{
    case Pending = 'pending';
    case Succeeded = 'succeeded';
    case Failed = 'failed';
}
// endregion ENUM_RevenueWithdrawalStateTypeEnum
