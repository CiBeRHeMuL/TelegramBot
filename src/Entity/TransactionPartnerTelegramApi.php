<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\TransactionPartnerTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a transaction partner from Telegram API.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#transactionpartnertelegramapi
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TransactionPartnerTelegramApi, Telegram, Bot API, DTO, transactionpartnertelegramapi
// STRUCTURE: ▶ ┌type,request_count┐ → ∑ partner
// region CLASS_TransactionPartnerTelegramApi

/**
 * Describes a transaction with payment for paid broadcasting.
 *
 * @see https://core.telegram.org/bots/api#paid-broadcasts paid broadcasting
 * @see https://core.telegram.org/bots/api#transactionpartnertelegramapi
 */
#[BuildIf(new FieldIsChecker('type', TransactionPartnerTypeEnum::TelegramApi->value))]
final class TransactionPartnerTelegramApi extends AbstractTransactionPartner
{
    /**
     * @param int $request_count The number of successful requests that exceeded regular limits and were therefore billed
     */
    public function __construct(
        protected int $request_count,
    ) {
        parent::__construct(TransactionPartnerTypeEnum::TelegramApi);
    }

    /**
     * @return int
     */
    public function getRequestCount(): int
    {
        return $this->request_count;
    }

    /**
     * @param int $request_count
     *
     * @return TransactionPartnerTelegramApi
     */
    public function setRequestCount(int $request_count): TransactionPartnerTelegramApi
    {
        $this->request_count = $request_count;

        return $this;
    }
}

// endregion CLASS_TransactionPartnerTelegramApi
