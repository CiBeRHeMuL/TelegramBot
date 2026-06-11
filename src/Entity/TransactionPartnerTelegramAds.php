<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a transaction partner from Telegram Ads.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#transactionpartnertelegramads
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TransactionPartnerTelegramAds, Telegram, Bot API, DTO, transactionpartnertelegramads
// STRUCTURE: ▶ ┌type┐ → ∑ partner
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
