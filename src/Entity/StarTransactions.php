<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * Contains a list of Telegram Star transactions.
 *
 * @link https://core.telegram.org/bots/api#startransactions
 */
class StarTransactions extends AbstractEntity
{
    /**
     * @param StarTransaction[] $transactions The list of transactions
     *
     * @see https://core.telegram.org/bots/api#startransaction StarTransaction
     */
    public function __construct(
        #[ArrayType(StarTransaction::class)]
        protected array $transactions,
    ) {
        parent::__construct();
    }

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

    public function toArray(): array|stdClass
    {
        return [
            'transactions' => array_map(fn(StarTransaction $e) => $e->toArray(), $this->transactions),
        ];
    }
}
