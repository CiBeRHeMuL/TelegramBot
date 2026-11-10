<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_GiveawayCreated
/**
 * This object represents a service message about the creation of a scheduled giveaway.
 *
 * @see https://core.telegram.org/bots/api#giveawaycreated
 */
final class GiveawayCreated implements EntityInterface
{
    /**
     * @param int|null $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram
     *                                   Star giveaways only
     */
    public function __construct(
        protected ?int $prize_star_count = null,
    ) {}

    /**
     * @return int|null
     */
    public function getPrizeStarCount(): ?int
    {
        return $this->prize_star_count;
    }
}
// endregion CLASS_GiveawayCreated
