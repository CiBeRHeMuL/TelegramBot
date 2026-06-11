<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CurrencyEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a paid suggested channel post.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#suggestedpostpaid
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SuggestedPostPaid, Telegram, Bot API, DTO, suggestedpostpaid
// STRUCTURE: ▶ ┌star_count...┐ → ∑ SuggestedPostPaid
// region CLASS_SuggestedPostPaid

/**
 * Describes a service message about a successful payment for a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostpaid
 */
final class SuggestedPostPaid implements EntityInterface
{
    /**
     * @param CurrencyEnum    $currency               Currency in which the payment was made. Currently, one of “XTR” for Telegram Stars or “TON”
     *                                                for toncoins
     * @param int|null        $amount                 Optional. The amount of the currency that was received by the channel in nanotoncoins; for payments
     *                                                in toncoins only
     * @param StarAmount|null $star_amount            Optional. The amount of Telegram Stars that was received by the channel; for payments
     *                                                in Telegram Stars only
     * @param Message|null    $suggested_post_message Optional. Message containing the suggested post. Note that the Message object
     *                                                in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#staramount StarAmount
     */
    public function __construct(
        protected CurrencyEnum $currency,
        protected ?int $amount = null,
        protected ?StarAmount $star_amount = null,
        protected ?Message $suggested_post_message = null,
    ) {}

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
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     *
     * @return SuggestedPostPaid
     */
    public function setAmount(?int $amount): SuggestedPostPaid
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return StarAmount|null
     */
    public function getStarAmount(): ?StarAmount
    {
        return $this->star_amount;
    }

    /**
     * @param StarAmount|null $star_amount
     *
     * @return SuggestedPostPaid
     */
    public function setStarAmount(?StarAmount $star_amount): SuggestedPostPaid
    {
        $this->star_amount = $star_amount;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getSuggestedPostMessage(): ?Message
    {
        return $this->suggested_post_message;
    }

    /**
     * @param Message|null $suggested_post_message
     *
     * @return SuggestedPostPaid
     */
    public function setSuggestedPostMessage(?Message $suggested_post_message): SuggestedPostPaid
    {
        $this->suggested_post_message = $suggested_post_message;

        return $this;
    }
}

// endregion CLASS_SuggestedPostPaid
