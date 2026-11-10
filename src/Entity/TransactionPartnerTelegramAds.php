<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

// region CLASS_TransactionPartnerTelegramAds
/**
 * Describes a withdrawal transaction to the Telegram Ads platform.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnertelegramads
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::TelegramAds->value))]
final class TransactionPartnerTelegramAds extends AbstractTransactionPartner
{
    public function __construct()
    {
        parent::__construct(TransactionPartnerTypeEnum::TelegramAds);
    }
}

// endregion CLASS_TransactionPartnerTelegramAds
