<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API refundStarPayment method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#refundstarpayment
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Refund, Star, Payment
// STRUCTURE: ▶ ┌telegram_payment_charge_id + user_id┐ → ◇ construct → ⊕ → ∑ ⟦RefundStarPaymentRequest⟧

// region CLASS_RefundStarPaymentRequest
/**
 * @see https://core.telegram.org/bots/api#refundstarpayment
 */
class RefundStarPaymentRequest implements RequestInterface
{
    /**
     * @param string $telegram_payment_charge_id Telegram payment identifier
     * @param int    $user_id                    Identifier of the user whose payment will be refunded
     */
    public function __construct(
        private string $telegram_payment_charge_id,
        private int $user_id,
    ) {}

    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegram_payment_charge_id;
    }

    public function setTelegramPaymentChargeId(string $telegram_payment_charge_id): RefundStarPaymentRequest
    {
        $this->telegram_payment_charge_id = $telegram_payment_charge_id;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): RefundStarPaymentRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_RefundStarPaymentRequest
