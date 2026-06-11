<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the source of a transaction, or its recipient for outgoing transactions.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#transactionpartner
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Transaction partner types] => TransactionPartnerFragment, TransactionPartnerUser, TransactionPartnerChat, TransactionPartnerOther, TransactionPartnerTelegramApi, TransactionPartnerTelegramAds, TransactionPartnerAffiliateProgram
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractTransactionPartner, Telegram Bot API, abstract, transaction, partner, DTO
// STRUCTURE: ▶ ┌type: TransactionPartnerTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractTransactionPartner [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
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
