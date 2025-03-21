<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

/**
 * This object describes the source of a transaction, or its recipient for outgoing transactions.
 * @link https://core.telegram.org/bots/api#transactionpartner
 */
#[AvailableInheritors([
    TransactionPartnerFragment::class,
    TransactionPartnerUser::class,
    TransactionPartnerChat::class,
    TransactionPartnerOther::class,
    TransactionPartnerTelegramApi::class,
    TransactionPartnerTelegramAds::class,
    TransactionPartnerAffiliateProgram::class,
])]
abstract class AbstractTransactionPartner extends AbstractEntity
{
    public function __construct(
        protected readonly TransactionPartnerTypeEnum $type,
    ) {
        parent::__construct();
    }

    public function getType(): TransactionPartnerTypeEnum
    {
        return $this->type;
    }
}
