<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;

/**
 * This object describes the state of a revenue withdrawal operation.
 * @link https://core.telegram.org/bots/api#revenuewithdrawalstate
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
    ) {
    }

    public function getType(): RevenueWithdrawalStateTypeEnum
    {
        return $this->type;
    }
}
