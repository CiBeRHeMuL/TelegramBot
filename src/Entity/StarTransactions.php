<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains a list of Telegram Star transactions.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#startransactions
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: StarTransactions, Telegram, Bot API, DTO, startransactions
// STRUCTURE: ▶ ┌transactions: StarTransaction[]┐ → ∑ StarTransactions
// region CLASS_StarTransactions

/**
 * Contains a list of Telegram Star transactions.
 *
 * @see https://core.telegram.org/bots/api#startransactions
 */
final class StarTransactions implements EntityInterface
{
    /**
     * @param StarTransaction[] $transactions The list of transactions
     *
     * @see https://core.telegram.org/bots/api#startransaction StarTransaction
     */
    public function __construct(
        #[ArrayType(StarTransaction::class)]
        protected array $transactions,
    ) {}

    /**
     * @return StarTransaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @param StarTransaction[] $transactions
     *
     * @return StarTransactions
     */
    public function setTransactions(array $transactions): StarTransactions
    {
        $this->transactions = $transactions;

        return $this;
    }
}

// endregion CLASS_StarTransactions
