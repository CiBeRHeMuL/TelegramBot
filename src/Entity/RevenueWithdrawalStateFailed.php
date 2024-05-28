<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;
use stdClass;

/**
 * The withdrawal failed and the transaction was refunded.
 * @link https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 */
#[BuildIf(new FieldIsChecker('type', RevenueWithdrawalStateTypeEnum::Failed->value))]
class RevenueWithdrawalStateFailed extends AbstractRevenueWithdrawalState
{
    public function __construct()
    {
        parent::__construct(RevenueWithdrawalStateTypeEnum::Failed);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
        ];
    }
}
