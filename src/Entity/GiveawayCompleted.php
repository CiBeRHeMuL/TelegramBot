<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about the completion of a giveaway without public winners.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#giveawaycompleted
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: GiveawayCompleted, giveaway, completed, service message, Telegram Bot API
// STRUCTURE: ┌winner_count┐ + optional unclaimed_prize_count + giveaway_message + is_star_giveaway → ∑ GiveawayCompleted
// region CLASS_GiveawayCompleted
/**
 * This object represents a service message about the completion of a giveaway without public winners.
 *
 * @see https://core.telegram.org/bots/api#giveawaycompleted
 */
final class GiveawayCompleted implements EntityInterface
{
    /**
     * @param int          $winner_count          Number of winners in the giveaway
     * @param int|null     $unclaimed_prize_count Optional. Number of undistributed prizes
     * @param Message|null $giveaway_message      Optional. Message with the giveaway that was completed, if it wasn't deleted
     * @param bool|null    $is_star_giveaway      Optional. True, if the giveaway is a Telegram Star giveaway. Otherwise, currently, the
     *                                            giveaway is a Telegram Premium giveaway.
     *
     * @see https://core.telegram.org/bots/api#message Message
     */
    public function __construct(
        protected int $winner_count,
        protected ?int $unclaimed_prize_count = null,
        protected ?Message $giveaway_message = null,
        protected ?bool $is_star_giveaway = null,
    ) {}

    /**
     * @return int
     */
    public function getWinnerCount(): int
    {
        return $this->winner_count;
    }

    /**
     * @param int $winner_count
     *
     * @return GiveawayCompleted
     */
    public function setWinnerCount(int $winner_count): GiveawayCompleted
    {
        $this->winner_count = $winner_count;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnclaimedPrizeCount(): ?int
    {
        return $this->unclaimed_prize_count;
    }

    /**
     * @param int|null $unclaimed_prize_count
     *
     * @return GiveawayCompleted
     */
    public function setUnclaimedPrizeCount(?int $unclaimed_prize_count): GiveawayCompleted
    {
        $this->unclaimed_prize_count = $unclaimed_prize_count;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getGiveawayMessage(): ?Message
    {
        return $this->giveaway_message;
    }

    /**
     * @param Message|null $giveaway_message
     *
     * @return GiveawayCompleted
     */
    public function setGiveawayMessage(?Message $giveaway_message): GiveawayCompleted
    {
        $this->giveaway_message = $giveaway_message;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsStarGiveaway(): ?bool
    {
        return $this->is_star_giveaway;
    }

    /**
     * @param bool|null $is_star_giveaway
     *
     * @return GiveawayCompleted
     */
    public function setIsStarGiveaway(?bool $is_star_giveaway): GiveawayCompleted
    {
        $this->is_star_giveaway = $is_star_giveaway;

        return $this;
    }
}
// endregion CLASS_GiveawayCompleted
