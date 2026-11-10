<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

// region CLASS_AbstractTransactionPartner
/**
 * This object describes the source of a transaction, or its recipient for outgoing transactions.
 *
 * @see https://core.telegram.org/bots/api#transactionpartner
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
abstract class AbstractTransactionPartner implements EntityInterface
{
    public function __construct(
        protected readonly TransactionPartnerTypeEnum $type,
    ) {}

    public function getType(): TransactionPartnerTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractTransactionPartner
