<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CurrencyEnum;
use stdClass;

/**
 * This object contains basic information about a successful payment.
 * @link https://core.telegram.org/bots/api#successfulpayment
 */
class SuccessfulPayment extends AbstractEntity
{
    /**
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code.
     * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double).
     * @param string $invoice_payload Bot specified invoice payload.
     * @param string $telegram_payment_charge_id Telegram payment identifier.
     * @param string $provider_payment_charge_id Provider payment identifier.
     * @param string|null $shipping_option_id Optional. Identifier of the shipping option chosen by the user.
     * @param OrderInfo|null $order_info Optional. Order information provided by the user.
     * @param int|null $subscription_expiration_date Optional. Expiration date of the subscription, in Unix time;
     * for recurring payments only
     * @param bool|null $is_recurring Optional. True, if the payment is a recurring payment for a subscription
     * @param bool|null $is_first_recurring Optional. True, if the payment is the first payment for a subscription
     */
    public function __construct(
        protected CurrencyEnum $currency,
        protected int $total_amount,
        protected string $invoice_payload,
        protected string $telegram_payment_charge_id,
        protected string $provider_payment_charge_id,
        protected string|null $shipping_option_id = null,
        protected OrderInfo|null $order_info = null,
        protected int|null $subscription_expiration_date = null,
        protected bool|null $is_recurring = null,
        protected bool|null $is_first_recurring = null,
    ) {
        parent::__construct();
    }

    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    public function setCurrency(CurrencyEnum $currency): SuccessfulPayment
    {
        $this->currency = $currency;
        return $this;
    }

    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    public function setTotalAmount(int $total_amount): SuccessfulPayment
    {
        $this->total_amount = $total_amount;
        return $this;
    }

    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    public function setInvoicePayload(string $invoice_payload): SuccessfulPayment
    {
        $this->invoice_payload = $invoice_payload;
        return $this;
    }

    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegram_payment_charge_id;
    }

    public function setTelegramPaymentChargeId(string $telegram_payment_charge_id): SuccessfulPayment
    {
        $this->telegram_payment_charge_id = $telegram_payment_charge_id;
        return $this;
    }

    public function getProviderPaymentChargeId(): string
    {
        return $this->provider_payment_charge_id;
    }

    public function setProviderPaymentChargeId(string $provider_payment_charge_id): SuccessfulPayment
    {
        $this->provider_payment_charge_id = $provider_payment_charge_id;
        return $this;
    }

    public function getShippingOptionId(): string|null
    {
        return $this->shipping_option_id;
    }

    public function setShippingOptionId(string|null $shipping_option_id): SuccessfulPayment
    {
        $this->shipping_option_id = $shipping_option_id;
        return $this;
    }

    public function getOrderInfo(): OrderInfo|null
    {
        return $this->order_info;
    }

    public function setOrderInfo(OrderInfo|null $order_info): SuccessfulPayment
    {
        $this->order_info = $order_info;
        return $this;
    }

    public function getSubscriptionExpirationDate(): ?int
    {
        return $this->subscription_expiration_date;
    }

    public function setSubscriptionExpirationDate(?int $subscription_expiration_date): void
    {
        $this->subscription_expiration_date = $subscription_expiration_date;
    }

    public function getIsRecurring(): ?bool
    {
        return $this->is_recurring;
    }

    public function setIsRecurring(?bool $is_recurring): void
    {
        $this->is_recurring = $is_recurring;
    }

    public function getIsFirstRecurring(): ?bool
    {
        return $this->is_first_recurring;
    }

    public function setIsFirstRecurring(?bool $is_first_recurring): void
    {
        $this->is_first_recurring = $is_first_recurring;
    }

    public function toArray(): array|stdClass
    {
        return [
            'currency' => $this->currency->value,
            'total_amount' => $this->total_amount,
            'invoice_payload' => $this->invoice_payload,
            'shipping_option_id' => $this->shipping_option_id,
            'order_info' => $this->order_info?->toArray(),
            'telegram_payment_charge_id' => $this->telegram_payment_charge_id,
            'provider_payment_charge_id' => $this->provider_payment_charge_id,
            'subscription_expiration_date' => $this->subscription_expiration_date,
            'is_recurring' => $this->is_recurring,
            'is_first_recurring' => $this->is_first_recurring,
        ];
    }
}
