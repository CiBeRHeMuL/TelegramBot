<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

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
