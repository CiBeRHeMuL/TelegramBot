<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CurrencyEnum;
use stdClass;

/**
 * This object contains basic information about an invoice.
 * @link https://core.telegram.org/bots/api#invoice
 */
class Invoice implements EntityInterface
{
    /**
     * @param string $title Product name.
     * @param string $description Product description.
     * @param string $start_parameter Unique bot deep-linking parameter that can be used to generate this invoice.
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code.
     * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double).
     * For example, for a price of US$ 1.45, pass amount = 145.
     * See the exp parameter in currencies.json,
     * it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     */
    public function __construct(
        private string $title,
        private string $description,
        private string $start_parameter,
        private CurrencyEnum $currency,
        private int $total_amount,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Invoice
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Invoice
    {
        $this->description = $description;
        return $this;
    }

    public function getStartParameter(): string
    {
        return $this->start_parameter;
    }

    public function setStartParameter(string $start_parameter): Invoice
    {
        $this->start_parameter = $start_parameter;
        return $this;
    }

    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    public function setCurrency(CurrencyEnum $currency): Invoice
    {
        $this->currency = $currency;
        return $this;
    }

    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    public function setTotalAmount(int $total_amount): Invoice
    {
        $this->total_amount = $total_amount;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'start_parameter' => $this->start_parameter,
            'currency' => $this->currency->value,
            'total_amount' => $this->total_amount,
        ];
    }
}
