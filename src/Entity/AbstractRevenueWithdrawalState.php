<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;

// region CLASS_AbstractRevenueWithdrawalState
/**
 * This object describes the state of a revenue withdrawal operation.
 *
 * @see https://core.telegram.org/bots/api#revenuewithdrawalstate
 */
#[AvailableInheritors([
    RevenueWithdrawalStatePending::class,
    RevenueWithdrawalStateSucceeded::class,
    RevenueWithdrawalStateFailed::class,
])]
abstract class AbstractRevenueWithdrawalState implements EntityInterface
{
    public function __construct(
        protected readonly RevenueWithdrawalStateTypeEnum $type,
    ) {}

    public function getType(): RevenueWithdrawalStateTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractRevenueWithdrawalState
