<?php

namespace AndrewGos\TelegramBot\Request;

class RefundStarPaymentRequest implements RequestInterface
{
    /**
     * @param string $telegram_payment_charge_id Telegram payment identifier
     * @param int $user_id Identifier of the user whose payment will be refunded
     */
    public function __construct(
        private string $telegram_payment_charge_id,
        private int $user_id,
    ) {
    }

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


    public function toArray(): array
    {
        return [
            'telegram_payment_charge_id' => $this->telegram_payment_charge_id,
            'user_id' => $this->user_id,
        ];
    }
}
