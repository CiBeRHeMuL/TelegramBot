<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a transaction partner from the affiliate program.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#transactionpartneraffiliateprogram
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TransactionPartnerAffiliateProgram, Telegram, Bot API, DTO, transactionpartneraffiliateprogram
// STRUCTURE: ▶ ┌type,commission_per_mille,withdrawal_state...┐ → ∑ partner
// region CLASS_TransactionPartnerAffiliateProgram

/**
 * Describes the affiliate program that issued the affiliate commission received via this transaction.
 *
 * @see https://core.telegram.org/bots/api#transactionpartneraffiliateprogram
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::AffiliateProgram->value))]
final class TransactionPartnerAffiliateProgram extends AbstractTransactionPartner
{
    /**
     * @param int       $commission_per_mille The number of Telegram Stars received by the bot for each 1000 Telegram Stars received by
     *                                        the affiliate program sponsor from referred users
     * @param User|null $sponsor_user         Optional. Information about the bot that sponsored the affiliate program
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected int $commission_per_mille,
        protected ?User $sponsor_user = null,
    ) {
        parent::__construct(TransactionPartnerTypeEnum::AffiliateProgram);
    }

    /**
     * @return int
     */
    public function getCommissionPerMille(): int
    {
        return $this->commission_per_mille;
    }

    /**
     * @param int $commission_per_mille
     *
     * @return TransactionPartnerAffiliateProgram
     */
    public function setCommissionPerMille(int $commission_per_mille): TransactionPartnerAffiliateProgram
    {
        $this->commission_per_mille = $commission_per_mille;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getSponsorUser(): ?User
    {
        return $this->sponsor_user;
    }

    /**
     * @param User|null $sponsor_user
     *
     * @return TransactionPartnerAffiliateProgram
     */
    public function setSponsorUser(?User $sponsor_user): TransactionPartnerAffiliateProgram
    {
        $this->sponsor_user = $sponsor_user;

        return $this;
    }
}

// endregion CLASS_TransactionPartnerAffiliateProgram
