<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;
use stdClass;

/**
 * Describes the affiliate program that issued the affiliate commission received via this transaction.
 *
 * @link https://core.telegram.org/bots/api#transactionpartneraffiliateprogram
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::AffiliateProgram->value))]
final class TransactionPartnerAffiliateProgram extends AbstractTransactionPartner
{
    /**
     * @param int $commission_per_mille The number of Telegram Stars received by the bot for each 1000 Telegram Stars received by
     * the affiliate program sponsor from referred users
     * @param User|null $sponsor_user Optional. Information about the bot that sponsored the affiliate program
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected int $commission_per_mille,
        protected User|null $sponsor_user = null,
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
    public function getSponsorUser(): User|null
    {
        return $this->sponsor_user;
    }

    /**
     * @param User|null $sponsor_user
     *
     * @return TransactionPartnerAffiliateProgram
     */
    public function setSponsorUser(User|null $sponsor_user): TransactionPartnerAffiliateProgram
    {
        $this->sponsor_user = $sponsor_user;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'commission_per_mille' => $this->commission_per_mille,
            'sponsor_user' => $this->sponsor_user?->toArray(),
            'type' => $this->type->value,
        ];
    }
}
