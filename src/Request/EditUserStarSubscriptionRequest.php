<?php

namespace AndrewGos\TelegramBot\Request;

class EditUserStarSubscriptionRequest implements RequestInterface
{
    /**
     * @param bool $is_canceled Pass True to cancel extension of the user subscription; the subscription must be active up to the
     * end of the current subscription period. Pass False to allow the user to re-enable a subscription that was previously canceled
     * by the bot.
     * @param string $telegram_payment_charge_id Telegram payment identifier for the subscription
     * @param int $user_id Identifier of the user whose subscription will be edited
     */
    public function __construct(
        private bool $is_canceled,
        private string $telegram_payment_charge_id,
        private int $user_id,
    ) {
    }

    public function getIsCanceled(): bool
    {
        return $this->is_canceled;
    }

    public function setIsCanceled(bool $is_canceled): EditUserStarSubscriptionRequest
    {
        $this->is_canceled = $is_canceled;
        return $this;
    }

    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegram_payment_charge_id;
    }

    public function setTelegramPaymentChargeId(string $telegram_payment_charge_id): EditUserStarSubscriptionRequest
    {
        $this->telegram_payment_charge_id = $telegram_payment_charge_id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): EditUserStarSubscriptionRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'is_canceled' => $this->is_canceled,
            'telegram_payment_charge_id' => $this->telegram_payment_charge_id,
            'user_id' => $this->user_id,
        ];
    }
}
