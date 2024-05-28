<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes a Telegram Star transaction.
 * @link https://core.telegram.org/bots/api#startransaction
 */
class StarTransaction extends AbstractEntity
{
    /**
     * @param string $id Unique identifier of the transaction. Coincides with the identifer of the original transaction for refund
     * transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for successful incoming payments from users.
     * @param int $amount Number of Telegram Stars transferred by the transaction
     * @param int $date Date the transaction was created in Unix time
     * @param AbstractTransactionPartner|null $receiver Optional. Receiver of an outgoing transaction (e.g., a user for a purchase refund,
     * Fragment for a withdrawal). Only for outgoing transactions
     * @param AbstractTransactionPartner|null $source Optional. Source of an incoming transaction (e.g., a user purchasing goods or services,
     * Fragment refunding a failed withdrawal). Only for incoming transactions
     * @param int|null $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars transferred by the transaction;
     * from 0 to 999999999
     */
    public function __construct(
        protected string $id,
        protected int $amount,
        protected int $date,
        protected AbstractTransactionPartner|null $receiver = null,
        protected AbstractTransactionPartner|null $source = null,
        protected int|null $nanostar_amount = null,
    ) {
        parent::__construct();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): StarTransaction
    {
        $this->id = $id;
        return $this;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): StarTransaction
    {
        $this->amount = $amount;
        return $this;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): StarTransaction
    {
        $this->date = $date;
        return $this;
    }

    public function getReceiver(): AbstractTransactionPartner|null
    {
        return $this->receiver;
    }

    public function setReceiver(AbstractTransactionPartner|null $receiver): StarTransaction
    {
        $this->receiver = $receiver;
        return $this;
    }

    public function getSource(): AbstractTransactionPartner|null
    {
        return $this->source;
    }

    public function setSource(AbstractTransactionPartner|null $source): StarTransaction
    {
        $this->source = $source;
        return $this;
    }

    public function getNanostarAmount(): ?int
    {
        return $this->nanostar_amount;
    }

    public function setNanostarAmount(?int $nanostar_amount): void
    {
        $this->nanostar_amount = $nanostar_amount;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'date' => $this->date,
            'receiver' => $this->receiver?->toArray(),
            'source' => $this->source?->toArray(),
            'nanostar_amount' => $this->nanostar_amount,
        ];
    }
}
