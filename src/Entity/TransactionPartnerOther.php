<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;
use stdClass;

/**
 * Describes a transaction with an unknown source or recipient.
 * @link https://core.telegram.org/bots/api#transactionpartnerother
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::Other->value))]
class TransactionPartnerOther extends AbstractTransactionPartner
{
    public function __construct()
    {
        parent::__construct(TransactionPartnerTypeEnum::Other);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
        ];
    }
}
