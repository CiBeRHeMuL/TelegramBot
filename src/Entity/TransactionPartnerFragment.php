<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;
use stdClass;

/**
 * Describes a withdrawal transaction with Fragment.
 *
 * @link https://core.telegram.org/bots/api#transactionpartnerfragment
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::Fragment->value))]
class TransactionPartnerFragment extends AbstractTransactionPartner
{
    /**
     * @param AbstractRevenueWithdrawalState|null $withdrawal_state Optional. State of the transaction if the transaction is outgoing
     *
     * @see https://core.telegram.org/bots/api#revenuewithdrawalstate RevenueWithdrawalState
     */
    public function __construct(
        protected AbstractRevenueWithdrawalState|null $withdrawal_state = null,
    ) {
        parent::__construct(TransactionPartnerTypeEnum::Fragment);
    }

    /**
     * @return AbstractRevenueWithdrawalState|null
     */
    public function getWithdrawalState(): AbstractRevenueWithdrawalState|null
    {
        return $this->withdrawal_state;
    }

    /**
     * @param AbstractRevenueWithdrawalState|null $withdrawal_state
     *
     * @return TransactionPartnerFragment
     */
    public function setWithdrawalState(AbstractRevenueWithdrawalState|null $withdrawal_state): TransactionPartnerFragment
    {
        $this->withdrawal_state = $withdrawal_state;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'withdrawal_state' => $this->withdrawal_state?->toArray(),
            'type' => $this->type->value,
        ];
    }
}
