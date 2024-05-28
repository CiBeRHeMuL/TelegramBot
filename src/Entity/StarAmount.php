<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes an amount of Telegram Stars.
 *
 * @link https://core.telegram.org/bots/api#staramount
 */
class StarAmount extends AbstractEntity
{
    /**
     * @param int $amount Integer amount of Telegram Stars, rounded to 0; can be negative
     * @param int|null $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars; from -999999999 to 999999999;
     * can be negative if and only if amount is non-positive
     */
    public function __construct(
        protected int $amount,
        protected int|null $nanostar_amount = null,
    ) {
        parent::__construct();
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): StarAmount
    {
        $this->amount = $amount;
        return $this;
    }

    public function getNanostarAmount(): int|null
    {
        return $this->nanostar_amount;
    }

    public function setNanostarAmount(int|null $nanostar_amount): StarAmount
    {
        $this->nanostar_amount = $nanostar_amount;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'amount' => $this->amount,
            'nanostar_amount' => $this->nanostar_amount,
        ];
    }
}
