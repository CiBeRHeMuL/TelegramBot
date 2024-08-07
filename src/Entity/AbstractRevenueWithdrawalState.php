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
abstract class AbstractRevenueWithdrawalState extends AbstractEntity
{
    public function __construct(
        protected readonly RevenueWithdrawalStateTypeEnum $type,
    ) {
        parent::__construct();
    }

    public function getType(): RevenueWithdrawalStateTypeEnum
    {
        return $this->type;
    }
}
