<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CurrencyEnum;

/**
 * This object contains information about an incoming pre-checkout query.
 *
 * @link https://core.telegram.org/bots/api#precheckoutquery
 */
final class PreCheckoutQuery implements EntityInterface
{
    /**
     * @param string $id Unique query identifier
     * @param User $from User who sent the query
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a
     * price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal
     * point for each currency (2 for the majority of currencies).
     * @param string $invoice_payload Bot-specified invoice payload
     * @param OrderInfo|null $order_info Optional. Order information provided by the user
     * @param string|null $shipping_option_id Optional. Identifier of the shipping option chosen by the user
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/payments#supported-currencies currency
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://core.telegram.org/bots/payments/currencies.json currencies.json
     * @see https://core.telegram.org/bots/api#orderinfo OrderInfo
     */
    public function __construct(
        protected string $id,
        protected User $from,
        protected CurrencyEnum $currency,
        protected int $total_amount,
        protected string $invoice_payload,
        protected ?OrderInfo $order_info = null,
        protected ?string $shipping_option_id = null,
    ) {}

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
     * @return PreCheckoutQuery
     */
    public function setId(string $id): PreCheckoutQuery
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     *
     * @return PreCheckoutQuery
     */
    public function setFrom(User $from): PreCheckoutQuery
    {
        $this->from = $from;
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
     * @return PreCheckoutQuery
     */
    public function setCurrency(CurrencyEnum $currency): PreCheckoutQuery
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
     * @return PreCheckoutQuery
     */
    public function setTotalAmount(int $total_amount): PreCheckoutQuery
    {
        $this->total_amount = $total_amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    /**
     * @param string $invoice_payload
     *
     * @return PreCheckoutQuery
     */
    public function setInvoicePayload(string $invoice_payload): PreCheckoutQuery
    {
        $this->invoice_payload = $invoice_payload;
        return $this;
    }

    /**
     * @return OrderInfo|null
     */
    public function getOrderInfo(): ?OrderInfo
    {
        return $this->order_info;
    }

    /**
     * @param OrderInfo|null $order_info
     *
     * @return PreCheckoutQuery
     */
    public function setOrderInfo(?OrderInfo $order_info): PreCheckoutQuery
    {
        $this->order_info = $order_info;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingOptionId(): ?string
    {
        return $this->shipping_option_id;
    }

    /**
     * @param string|null $shipping_option_id
     *
     * @return PreCheckoutQuery
     */
    public function setShippingOptionId(?string $shipping_option_id): PreCheckoutQuery
    {
        $this->shipping_option_id = $shipping_option_id;
        return $this;
    }
}
