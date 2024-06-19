<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Builder\Attribute\ArrayType;

/**
 * Contains a list of Telegram Star transactions.
 * @link https://core.telegram.org/bots/api#startransactions
 */
class StarTransactions extends AbstractEntity
{
    /**
     * @param StarTransaction[] $transactions The list of transactions
     */
    public function __construct(
        #[ArrayType(StarTransaction::class)] protected array $transactions,
    ) {
        parent::__construct();
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function setTransactions(array $transactions): StarTransactions
    {
        $this->transactions = $transactions;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'transactions' => array_map(fn(StarTransaction $e) => $e->toArray(), $this->transactions),
        ];
    }
}
