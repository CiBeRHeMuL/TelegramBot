<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CurrencyEnum;
use stdClass;

/**
 * Describes a service message about a successful payment for a suggested post.
 *
 * @link https://core.telegram.org/bots/api#suggestedpostpaid
 */
final class SuggestedPostPaid implements EntityInterface
{
    /**
     * @param CurrencyEnum $currency Currency in which the payment was made. Currently, one of “XTR” for Telegram Stars or “TON”
     * for toncoins
     * @param int|null $amount Optional. The amount of the currency that was received by the channel in nanotoncoins; for payments
     * in toncoins only
     * @param StarAmount|null $star_amount Optional. The amount of Telegram Stars that was received by the channel; for payments
     * in Telegram Stars only
     * @param Message|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object
     * in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#staramount StarAmount
     */
    public function __construct(
        protected CurrencyEnum $currency,
        protected int|null $amount = null,
        protected StarAmount|null $star_amount = null,
        protected Message|null $suggested_post_message = null,
    ) {
    }

    /**
     * @return CurrencyEnum
     */
    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    /**
     * @param CurrencyEnum $currency
     *
     * @return SuggestedPostPaid
     */
    public function setCurrency(CurrencyEnum $currency): SuggestedPostPaid
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAmount(): int|null
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     *
     * @return SuggestedPostPaid
     */
    public function setAmount(int|null $amount): SuggestedPostPaid
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return StarAmount|null
     */
    public function getStarAmount(): StarAmount|null
    {
        return $this->star_amount;
    }

    /**
     * @param StarAmount|null $star_amount
     *
     * @return SuggestedPostPaid
     */
    public function setStarAmount(StarAmount|null $star_amount): SuggestedPostPaid
    {
        $this->star_amount = $star_amount;
        return $this;
    }

    /**
     * @return Message|null
     */
    public function getSuggestedPostMessage(): Message|null
    {
        return $this->suggested_post_message;
    }

    /**
     * @param Message|null $suggested_post_message
     *
     * @return SuggestedPostPaid
     */
    public function setSuggestedPostMessage(Message|null $suggested_post_message): SuggestedPostPaid
    {
        $this->suggested_post_message = $suggested_post_message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'currency' => $this->currency->value,
            'amount' => $this->amount,
            'star_amount' => $this->star_amount?->toArray(),
            'suggested_post_message' => $this->suggested_post_message?->toArray(),
        ];
    }
}
