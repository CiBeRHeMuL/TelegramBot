<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CurrencyEnum;

/**
 * This object contains basic information about a successful payment. Note that if the buyer initiates a chargeback with the
 * relevant payment provider following this transaction, the funds may be debited from your balance. This is outside of Telegram's
 * control.
 *
 * @link https://core.telegram.org/bots/api#successfulpayment
 */
final class SuccessfulPayment implements EntityInterface
{
    /**
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a
     * price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal
     * point for each currency (2 for the majority of currencies).
     * @param string $invoice_payload Bot-specified invoice payload
     * @param string $telegram_payment_charge_id Telegram payment identifier
     * @param string $provider_payment_charge_id Provider payment identifier
     * @param string|null $shipping_option_id Optional. Identifier of the shipping option chosen by the user
     * @param OrderInfo|null $order_info Optional. Order information provided by the user
     * @param int|null $subscription_expiration_date Optional. Expiration date of the subscription, in Unix time; for recurring payments
     * only
     * @param bool|null $is_recurring Optional. True, if the payment is a recurring payment for a subscription
     * @param bool|null $is_first_recurring Optional. True, if the payment is the first payment for a subscription
     *
     * @see https://core.telegram.org/bots/payments#supported-currencies currency
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://core.telegram.org/bots/payments/currencies.json currencies.json
     * @see https://core.telegram.org/bots/api#orderinfo OrderInfo
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
     * @return SuccessfulPayment
     */
    public function setCurrency(CurrencyEnum $currency): SuccessfulPayment
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
     * @return SuccessfulPayment
     */
    public function setTotalAmount(int $total_amount): SuccessfulPayment
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
     * @return SuccessfulPayment
     */
    public function setInvoicePayload(string $invoice_payload): SuccessfulPayment
    {
        $this->invoice_payload = $invoice_payload;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegram_payment_charge_id;
    }

    /**
     * @param string $telegram_payment_charge_id
     *
     * @return SuccessfulPayment
     */
    public function setTelegramPaymentChargeId(string $telegram_payment_charge_id): SuccessfulPayment
    {
        $this->telegram_payment_charge_id = $telegram_payment_charge_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderPaymentChargeId(): string
    {
        return $this->provider_payment_charge_id;
    }

    /**
     * @param string $provider_payment_charge_id
     *
     * @return SuccessfulPayment
     */
    public function setProviderPaymentChargeId(string $provider_payment_charge_id): SuccessfulPayment
    {
        $this->provider_payment_charge_id = $provider_payment_charge_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingOptionId(): string|null
    {
        return $this->shipping_option_id;
    }

    /**
     * @param string|null $shipping_option_id
     *
     * @return SuccessfulPayment
     */
    public function setShippingOptionId(string|null $shipping_option_id): SuccessfulPayment
    {
        $this->shipping_option_id = $shipping_option_id;
        return $this;
    }

    /**
     * @return OrderInfo|null
     */
    public function getOrderInfo(): OrderInfo|null
    {
        return $this->order_info;
    }

    /**
     * @param OrderInfo|null $order_info
     *
     * @return SuccessfulPayment
     */
    public function setOrderInfo(OrderInfo|null $order_info): SuccessfulPayment
    {
        $this->order_info = $order_info;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSubscriptionExpirationDate(): int|null
    {
        return $this->subscription_expiration_date;
    }

    /**
     * @param int|null $subscription_expiration_date
     *
     * @return SuccessfulPayment
     */
    public function setSubscriptionExpirationDate(int|null $subscription_expiration_date): SuccessfulPayment
    {
        $this->subscription_expiration_date = $subscription_expiration_date;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsRecurring(): bool|null
    {
        return $this->is_recurring;
    }

    /**
     * @param bool|null $is_recurring
     *
     * @return SuccessfulPayment
     */
    public function setIsRecurring(bool|null $is_recurring): SuccessfulPayment
    {
        $this->is_recurring = $is_recurring;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsFirstRecurring(): bool|null
    {
        return $this->is_first_recurring;
    }

    /**
     * @param bool|null $is_first_recurring
     *
     * @return SuccessfulPayment
     */
    public function setIsFirstRecurring(bool|null $is_first_recurring): SuccessfulPayment
    {
        $this->is_first_recurring = $is_first_recurring;
        return $this;
    }
}
