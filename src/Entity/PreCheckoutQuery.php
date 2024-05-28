<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CurrencyEnum;

/**
 * This object contains information about an incoming pre-checkout query.
 * @link https://core.telegram.org/bots/api#precheckoutquery
 */
class PreCheckoutQuery implements EntityInterface
{
    /**
     * @param string $id Unique query identifier
     * @param User $from User who sent the query
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code
     * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a
     * price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal
     * point for each currency (2 for the majority of currencies).
     * @param string $invoice_payload Bot specified invoice payload
     * @param OrderInfo|null $order_info Optional. Order information provided by the user
     * @param string|null $shipping_option_id Optional. Identifier of the shipping option chosen by the user
     */
    public function __construct(
        private string $id,
        private User $from,
        private CurrencyEnum $currency,
        private int $total_amount,
        private string $invoice_payload,
        private OrderInfo|null $order_info = null,
        private string|null $shipping_option_id = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): PreCheckoutQuery
    {
        $this->id = $id;
        return $this;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function setFrom(User $from): PreCheckoutQuery
    {
        $this->from = $from;
        return $this;
    }

    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    public function setCurrency(CurrencyEnum $currency): PreCheckoutQuery
    {
        $this->currency = $currency;
        return $this;
    }

    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    public function setTotalAmount(int $total_amount): PreCheckoutQuery
    {
        $this->total_amount = $total_amount;
        return $this;
    }

    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    public function setInvoicePayload(string $invoice_payload): PreCheckoutQuery
    {
        $this->invoice_payload = $invoice_payload;
        return $this;
    }

    public function getOrderInfo(): OrderInfo|null
    {
        return $this->order_info;
    }

    public function setOrderInfo(OrderInfo|null $order_info): PreCheckoutQuery
    {
        $this->order_info = $order_info;
        return $this;
    }

    public function getShippingOptionId(): string|null
    {
        return $this->shipping_option_id;
    }

    public function setShippingOptionId(string|null $shipping_option_id): PreCheckoutQuery
    {
        $this->shipping_option_id = $shipping_option_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'from' => $this->from->toArray(),
            'currency' => $this->currency->value,
            'total_amount' => $this->total_amount,
            'invoice_payload' => $this->invoice_payload,
            'order_info' => $this->order_info?->toArray(),
            'shipping_option_id' => $this->shipping_option_id,
        ];
    }
}
