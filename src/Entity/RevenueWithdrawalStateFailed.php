<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;

/**
 * The withdrawal failed and the transaction was refunded.
 *
 * @link https://core.telegram.org/bots/api#revenuewithdrawalstatefailed
 */
#[BuildIf(new FieldIsChecker('type', RevenueWithdrawalStateTypeEnum::Failed->value))]
final class RevenueWithdrawalStateFailed extends AbstractRevenueWithdrawalState
{
    public function __construct()
    {
        parent::__construct(RevenueWithdrawalStateTypeEnum::Failed);
    }
}
