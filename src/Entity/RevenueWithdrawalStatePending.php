<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Builder\Attribute\BuildIf;
use AndrewGos\TelegramBot\Builder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RevenueWithdrawalStateTypeEnum;
use stdClass;

/**
 * The withdrawal is in progress.
 * @link https://core.telegram.org/bots/api#revenuewithdrawalstatepending
 */
#[BuildIf(new FieldIsChecker('type', RevenueWithdrawalStateTypeEnum::Pending->value))]
class RevenueWithdrawalStatePending extends AbstractRevenueWithdrawalState
{
    public function __construct()
    {
        parent::__construct(RevenueWithdrawalStateTypeEnum::Pending);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
        ];
    }
}
