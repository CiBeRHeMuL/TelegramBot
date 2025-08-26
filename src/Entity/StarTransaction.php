<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes a Telegram Star transaction. Note that if the buyer initiates a chargeback with the payment provider from whom they
 * acquired Stars (e.g., Apple, Google) following this transaction, the refunded Stars will be deducted from the bot's balance.
 * This is outside of Telegram's control.
 *
 * @link https://core.telegram.org/bots/api#startransaction
 */
final class StarTransaction implements EntityInterface
{
    /**
     * @param string $id Unique identifier of the transaction. Coincides with the identifier of the original transaction for refund
     * transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for successful incoming payments from users.
     * @param int $amount Integer amount of Telegram Stars transferred by the transaction
     * @param int $date Date the transaction was created in Unix time
     * @param AbstractTransactionPartner|null $receiver Optional. Receiver of an outgoing transaction (e.g., a user for a purchase
     * refund, Fragment for a withdrawal). Only for outgoing transactions
     * @param AbstractTransactionPartner|null $source Optional. Source of an incoming transaction (e.g., a user purchasing goods
     * or services, Fragment refunding a failed withdrawal). Only for incoming transactions
     * @param int|null $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars transferred by the transaction;
     * from 0 to 999999999
     *
     * @see https://core.telegram.org/bots/api#transactionpartner TransactionPartner
     * @see https://core.telegram.org/bots/api#transactionpartner TransactionPartner
     */
    public function __construct(
        protected string $id,
        protected int $amount,
        protected int $date,
        protected AbstractTransactionPartner|null $receiver = null,
        protected AbstractTransactionPartner|null $source = null,
        protected int|null $nanostar_amount = null,
    ) {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return StarTransaction
     */
    public function setId(string $id): StarTransaction
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return StarTransaction
     */
    public function setAmount(int $amount): StarTransaction
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     *
     * @return StarTransaction
     */
    public function setDate(int $date): StarTransaction
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return AbstractTransactionPartner|null
     */
    public function getReceiver(): AbstractTransactionPartner|null
    {
        return $this->receiver;
    }

    /**
     * @param AbstractTransactionPartner|null $receiver
     *
     * @return StarTransaction
     */
    public function setReceiver(AbstractTransactionPartner|null $receiver): StarTransaction
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @return AbstractTransactionPartner|null
     */
    public function getSource(): AbstractTransactionPartner|null
    {
        return $this->source;
    }

    /**
     * @param AbstractTransactionPartner|null $source
     *
     * @return StarTransaction
     */
    public function setSource(AbstractTransactionPartner|null $source): StarTransaction
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNanostarAmount(): int|null
    {
        return $this->nanostar_amount;
    }

    /**
     * @param int|null $nanostar_amount
     *
     * @return StarTransaction
     */
    public function setNanostarAmount(int|null $nanostar_amount): StarTransaction
    {
        $this->nanostar_amount = $nanostar_amount;
        return $this;
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
