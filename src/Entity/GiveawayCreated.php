<?php

namespace AndrewGos\TelegramBot\Entity;

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
        protected ?int $prize_star_count = null,
    ) {}

    /**
     * @return int|null
     */
    public function getPrizeStarCount(): ?int
    {
        return $this->prize_star_count;
    }

    /**
     * @param int|null $prize_star_count
     *
     * @return GiveawayCreated
     */
    public function setPrizeStarCount(?int $prize_star_count): GiveawayCreated
    {
        $this->prize_star_count = $prize_star_count;
        return $this;
    }
}
