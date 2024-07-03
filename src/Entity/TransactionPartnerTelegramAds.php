<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Builder\Attribute\BuildIf;
use AndrewGos\TelegramBot\Builder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Entity\AbstractTransactionPartner;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;
use stdClass;

/**
 * Describes a withdrawal transaction to the Telegram Ads platform.
 * @link https://core.telegram.org/bots/api#transactionpartnertelegramads
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::TelegramAds->value))]
class TransactionPartnerTelegramAds extends AbstractTransactionPartner
{
    public function __construct()
    {
        parent::__construct(TransactionPartnerTypeEnum::TelegramAds);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
        ];
    }
}
