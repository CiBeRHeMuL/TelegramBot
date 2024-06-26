<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Builder\Attribute\BuildIf;
use AndrewGos\TelegramBot\Builder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

/**
 * Describes a withdrawal transaction with Fragment.
 * @link https://core.telegram.org/bots/api#transactionpartnerfragment
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::Fragment->value))]
class TransactionPartnerFragment extends AbstractTransactionPartner
{
    /**
     * @param AbstractRevenueWithdrawalState|null $withdrawal_state Optional. State of the transaction if the transaction is outgoing
     */
    public function __construct(
        protected AbstractRevenueWithdrawalState|null $withdrawal_state = null,
    ) {
        parent::__construct(TransactionPartnerTypeEnum::Fragment);
    }

    public function getWithdrawalState(): AbstractRevenueWithdrawalState|null
    {
        return $this->withdrawal_state;
    }

    public function setWithdrawalState(AbstractRevenueWithdrawalState|null $withdrawal_state): TransactionPartnerFragment
    {
        $this->withdrawal_state = $withdrawal_state;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'withdrawal_state' => $this->withdrawal_state?->toArray(),
        ];
    }
}
