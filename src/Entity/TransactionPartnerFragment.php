<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a transaction partner from Fragment.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#transactionpartnerfragment
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TransactionPartnerFragment, Telegram, Bot API, DTO, transactionpartnerfragment
// STRUCTURE: ▶ ┌type,withdrawal_state...┐ → ∑ partner
// region CLASS_TransactionPartnerFragment

/**
 * Describes a withdrawal transaction with Fragment.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerfragment
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::Fragment->value))]
final class TransactionPartnerFragment extends AbstractTransactionPartner
{
    /**
     * @param AbstractRevenueWithdrawalState|null $withdrawal_state Optional. State of the transaction if the transaction is outgoing
     *
     * @see https://core.telegram.org/bots/api#revenuewithdrawalstate RevenueWithdrawalState
     */
    public function __construct(
        protected ?AbstractRevenueWithdrawalState $withdrawal_state = null,
    ) {
        parent::__construct(TransactionPartnerTypeEnum::Fragment);
    }

    /**
     * @return AbstractRevenueWithdrawalState|null
     */
    public function getWithdrawalState(): ?AbstractRevenueWithdrawalState
    {
        return $this->withdrawal_state;
    }

    /**
     * @param AbstractRevenueWithdrawalState|null $withdrawal_state
     *
     * @return TransactionPartnerFragment
     */
    public function setWithdrawalState(?AbstractRevenueWithdrawalState $withdrawal_state): TransactionPartnerFragment
    {
        $this->withdrawal_state = $withdrawal_state;

        return $this;
    }
}

// endregion CLASS_TransactionPartnerFragment
