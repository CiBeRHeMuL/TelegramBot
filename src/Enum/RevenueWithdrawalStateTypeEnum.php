<?php

namespace AndrewGos\TelegramBot\Enum;

enum RevenueWithdrawalStateTypeEnum: string
{
    case Pending = 'pending';
    case Succeeded = 'succeeded';
    case Failed = 'failed';
}
