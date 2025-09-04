<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CurrencyEnum;

/**
 * This object contains basic information about an invoice.
 *
 * @link https://core.telegram.org/bots/api#invoice
 */
final class Invoice implements EntityInterface
{
    /**
     * @param string $title Product name
     * @param string $description Product description
     * @param string $start_parameter Unique bot deep-linking parameter that can be used to generate this invoice
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a
     * price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal
     * point for each currency (2 for the majority of currencies).
     *
     * @see https://core.telegram.org/bots/payments#supported-currencies currency
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://core.telegram.org/bots/payments/currencies.json currencies.json
     */
    public function __construct(
        protected string $title,
        protected string $description,
        protected string $start_parameter,
        protected CurrencyEnum $currency,
        protected int $total_amount,
    ) {
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Invoice
     */
    public function setTitle(string $title): Invoice
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Invoice
     */
    public function setDescription(string $description): Invoice
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartParameter(): string
    {
        return $this->start_parameter;
    }

    /**
     * @param string $start_parameter
     *
     * @return Invoice
     */
    public function setStartParameter(string $start_parameter): Invoice
    {
        $this->start_parameter = $start_parameter;
        return $this;
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
     * @return Invoice
     */
    public function setCurrency(CurrencyEnum $currency): Invoice
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    /**
     * @param int $total_amount
     *
     * @return Invoice
     */
    public function setTotalAmount(int $total_amount): Invoice
    {
        $this->total_amount = $total_amount;
        return $this;
    }
}
