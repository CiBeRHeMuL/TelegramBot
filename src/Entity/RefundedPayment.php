<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\CurrencyEnum;
use stdClass;

/**
 * This object contains basic information about a refunded payment.
 * @link https://core.telegram.org/bots/api#refundedpayment
 */
class RefundedPayment extends AbstractEntity
{
    /**
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars. Currently, always
     * “XTR”
     * @param int $total_amount Total refunded price in the smallest units of the currency (integer, not float/double). For example,
     * for a price of US$ 1.45, total_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past
     * the decimal point for each currency (2 for the majority of currencies).
     * @param string $invoice_payload Bot-specified invoice payload
     * @param string $telegram_payment_charge_id Telegram payment identifier
     * @param string|null $provider_payment_charge_id Optional. Provider payment identifier
     *
     * @see https://core.telegram.org/bots/payments/currencies.json
     */
    public function __construct(
        protected CurrencyEnum $currency,
        protected int $total_amount,
        protected string $invoice_payload,
        protected string $telegram_payment_charge_id,
        protected string|null $provider_payment_charge_id = null,
    ) {
        parent::__construct();
    }

    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    public function setCurrency(CurrencyEnum $currency): RefundedPayment
    {
        $this->currency = $currency;
        return $this;
    }

    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    public function setTotalAmount(int $total_amount): RefundedPayment
    {
        $this->total_amount = $total_amount;
        return $this;
    }

    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    public function setInvoicePayload(string $invoice_payload): RefundedPayment
    {
        $this->invoice_payload = $invoice_payload;
        return $this;
    }

    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegram_payment_charge_id;
    }

    public function setTelegramPaymentChargeId(string $telegram_payment_charge_id): RefundedPayment
    {
        $this->telegram_payment_charge_id = $telegram_payment_charge_id;
        return $this;
    }

    public function getProviderPaymentChargeId(): string|null
    {
        return $this->provider_payment_charge_id;
    }

    public function setProviderPaymentChargeId(string|null $provider_payment_charge_id): RefundedPayment
    {
        $this->provider_payment_charge_id = $provider_payment_charge_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'currency' => $this->currency->value,
            'total_amount' => $this->total_amount,
            'invoice_payload' => $this->invoice_payload,
            'telegram_payment_charge_id' => $this->telegram_payment_charge_id,
            'provider_payment_charge_id' => $this->provider_payment_charge_id,
        ];
    }
}
