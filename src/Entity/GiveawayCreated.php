<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about the creation of a scheduled giveaway.
 *
 * @link https://core.telegram.org/bots/api#giveawaycreated
 */
final class GiveawayCreated implements EntityInterface
{
    /**
     * @param int|null $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram
     * Star giveaways only
     */
    public function __construct(
        protected int|null $prize_star_count = null,
    ) {
    }

    /**
     * @return int|null
     */
    public function getPrizeStarCount(): int|null
    {
        return $this->prize_star_count;
    }

    /**
     * @param int|null $prize_star_count
     *
     * @return GiveawayCreated
     */
    public function setPrizeStarCount(int|null $prize_star_count): GiveawayCreated
    {
        $this->prize_star_count = $prize_star_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'prize_star_count' => $this->prize_star_count,
        ];
    }
}
