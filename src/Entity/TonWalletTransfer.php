<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_TonWalletTransfer
/**
 * Describes a service message about a transfer with a TON wallet.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#tonwallettransfer
 */
final class TonWalletTransfer implements EntityInterface
{
    /**
     * @param string      $transaction_id Unique identifier of the transaction; may be empty if the transfer hasn't been sent yet
     * @param string      $peer_address   Address of the transfer peer in the TON blockchain
     * @param string      $amount         The amount of transferred cryptocurrency, in the smallest units of the cryptocurrency, as a decimal
     *                                    number; negative for outgoing transfers
     * @param string|null $comment        Optional. Comment added to the transfer; omitted if the comment is encrypted
     */
    public function __construct(
        protected string $transaction_id,
        protected string $peer_address,
        protected string $amount,
        protected ?string $comment = null,
    ) {}

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transaction_id;
    }

    /**
     * @param string $transaction_id
     *
     * @return TonWalletTransfer
     */
    public function setTransactionId(string $transaction_id): TonWalletTransfer
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPeerAddress(): string
    {
        return $this->peer_address;
    }

    /**
     * @param string $peer_address
     *
     * @return TonWalletTransfer
     */
    public function setPeerAddress(string $peer_address): TonWalletTransfer
    {
        $this->peer_address = $peer_address;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     *
     * @return TonWalletTransfer
     */
    public function setAmount(string $amount): TonWalletTransfer
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     *
     * @return TonWalletTransfer
     */
    public function setComment(?string $comment): TonWalletTransfer
    {
        $this->comment = $comment;

        return $this;
    }
}
// endregion CLASS_TonWalletTransfer
