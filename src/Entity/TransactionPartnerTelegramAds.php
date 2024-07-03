<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
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
