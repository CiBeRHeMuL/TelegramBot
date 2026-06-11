<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CurrencyEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains price information for a suggested channel post.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#suggestedpostprice
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SuggestedPostPrice, Telegram, Bot API, DTO, suggestedpostprice
// STRUCTURE: ▶ ┌currency,amount┐ → ∑ price
// region CLASS_SuggestedPostPrice

/**
 * Describes the price of a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostprice
 */
final class SuggestedPostPrice implements EntityInterface
{
    /**
     * @param CurrencyEnum $currency Currency in which the post will be paid. Currently, must be one of “XTR” for Telegram Stars
     *                               or “TON” for toncoins
     * @param int          $amount   The amount of the currency that will be paid for the post in the smallest units of the currency, i.e. Telegram
     *                               Stars or nanotoncoins. Currently, price in Telegram Stars must be between 5 and 100000, and price in nanotoncoins must be
     *                               between 10000000 and 10000000000000.
     */
    public function __construct(
        protected CurrencyEnum $currency,
        protected int $amount,
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
     * @return SuggestedPostPrice
     */
    public function setCurrency(CurrencyEnum $currency): SuggestedPostPrice
    {
        $this->currency = $currency;

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
     * @return SuggestedPostPrice
     */
    public function setAmount(int $amount): SuggestedPostPrice
    {
        $this->amount = $amount;

        return $this;
    }
}

// endregion CLASS_SuggestedPostPrice
