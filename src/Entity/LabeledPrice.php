<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a portion of the price for goods or services.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#labeledprice
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: LabeledPrice, Telegram, Bot API, DTO, labeledprice
// STRUCTURE: ▶ ┌label,amount┐ → ∑ LabeledPrice
// region CLASS_LabeledPrice

/**
 * This object represents a portion of the price for goods or services.
 *
 * @see https://core.telegram.org/bots/api#labeledprice
 */
final class LabeledPrice implements EntityInterface
{
    /**
     * @param string $label  Portion label
     * @param int    $amount Price of the product in the smallest units of the currency (integer, not float/double). For example, for
     *                       a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal
     *                       point for each currency (2 for the majority of currencies).
     *
     * @see https://core.telegram.org/bots/payments#supported-currencies currency
     * @see https://core.telegram.org/bots/payments/currencies.json currencies.json
     */
    public function __construct(
        protected string $label,
        protected int $amount,
    ) {}

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return LabeledPrice
     */
    public function setLabel(string $label): LabeledPrice
    {
        $this->label = $label;

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
     * @return LabeledPrice
     */
    public function setAmount(int $amount): LabeledPrice
    {
        $this->amount = $amount;

        return $this;
    }
}

// endregion CLASS_LabeledPrice
