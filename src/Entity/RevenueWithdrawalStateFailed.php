<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;

// region CLASS_RevenueWithdrawalStateFailed
/**
 * The withdrawal failed and the transaction was refunded.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstatefailed
 */
#[BuildIf(new FieldIsChecker('type', RevenueWithdrawalStateTypeEnum::Failed->value))]
final class RevenueWithdrawalStateFailed extends AbstractRevenueWithdrawalState
{
    public function __construct()
    {
        parent::__construct(RevenueWithdrawalStateTypeEnum::Failed);
    }
}

// endregion CLASS_RevenueWithdrawalStateFailed
