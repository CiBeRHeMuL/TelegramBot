<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a portion of the price for goods or services.
 * @link https://core.telegram.org/bots/api#labeledprice
 */
class LabeledPrice implements EntityInterface
{
    /**
     * @param string $label Portion label
     * @param int $amount Price of the product in the smallest units of the currency (integer, not float/double). For example, for
     * a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal
     * point for each currency (2 for the majority of currencies).
     */
    public function __construct(
        private string $label,
        private int $amount,
    ) {
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): LabeledPrice
    {
        $this->label = $label;
        return $this;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): LabeledPrice
    {
        $this->amount = $amount;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'amount' => $this->amount,
        ];
    }
}
