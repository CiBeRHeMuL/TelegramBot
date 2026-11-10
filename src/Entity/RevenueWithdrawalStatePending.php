<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;

// region CLASS_RevenueWithdrawalStatePending
/**
 * The withdrawal is in progress.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 */
#[BuildIf(new FieldIsChecker('type', RevenueWithdrawalStateTypeEnum::Pending->value))]
final class RevenueWithdrawalStatePending extends AbstractRevenueWithdrawalState
{
    public function __construct()
    {
        parent::__construct(RevenueWithdrawalStateTypeEnum::Pending);
    }
}

// endregion CLASS_RevenueWithdrawalStatePending
