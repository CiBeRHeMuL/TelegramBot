<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes an amount of Telegram Stars.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#staramount
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: StarAmount, Telegram, Bot API, DTO, staramount
// STRUCTURE: ▶ ┌amount┐ → ◇ nanostar_amount → ∑ StarAmount
// region CLASS_StarAmount

/**
 * Describes an amount of Telegram Stars.
 *
 * @see https://core.telegram.org/bots/api#staramount
 */
final class StarAmount implements EntityInterface
{
    /**
     * @param int      $amount          Integer amount of Telegram Stars, rounded to 0; can be negative
     * @param int|null $nanostar_amount Optional. The number of 1/1000000000 shares of Telegram Stars; from -999999999 to 999999999;
     *                                  can be negative if and only if amount is non-positive
     */
    public function __construct(
        protected int $amount,
        protected ?int $nanostar_amount = null,
    ) {}

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return StarAmount
     */
    public function setAmount(int $amount): StarAmount
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNanostarAmount(): ?int
    {
        return $this->nanostar_amount;
    }

    /**
     * @param int|null $nanostar_amount
     *
     * @return StarAmount
     */
    public function setNanostarAmount(?int $nanostar_amount): StarAmount
    {
        $this->nanostar_amount = $nanostar_amount;

        return $this;
    }
}

// endregion CLASS_StarAmount
