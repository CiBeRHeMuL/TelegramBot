<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

// region CLASS_TransactionPartnerOther
/**
 * Describes a transaction with an unknown source or recipient.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerother
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::Other->value))]
final class TransactionPartnerOther extends AbstractTransactionPartner
{
    public function __construct()
    {
        parent::__construct(TransactionPartnerTypeEnum::Other);
    }
}

// endregion CLASS_TransactionPartnerOther
