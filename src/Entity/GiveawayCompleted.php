<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about the completion of a giveaway without public winners.
 * @link https://core.telegram.org/bots/api#giveawaycompleted
 */
class GiveawayCompleted implements EntityInterface
{
    /**
     * @param int $winner_count Number of winners in the giveaway
     * @param int|null $unclaimed_prize_count Optional. Number of undistributed prizes
     * @param Message|null $giveaway_message Optional. Message with the giveaway that was completed, if it wasn't deleted
     */
    public function __construct(
        private int $winner_count,
        private int|null $unclaimed_prize_count = null,
        private Message|null $giveaway_message = null
    ) {
    }

    public function getWinnerCount(): int
    {
        return $this->winner_count;
    }

    public function setWinnerCount(int $winner_count): GiveawayCompleted
    {
        $this->winner_count = $winner_count;
        return $this;
    }

    public function getUnclaimedPrizeCount(): int|null
    {
        return $this->unclaimed_prize_count;
    }

    public function setUnclaimedPrizeCount(int|null $unclaimed_prize_count): GiveawayCompleted
    {
        $this->unclaimed_prize_count = $unclaimed_prize_count;
        return $this;
    }

    public function getGiveawayMessage(): Message|null
    {
        return $this->giveaway_message;
    }

    public function setGiveawayMessage(Message|null $giveaway_message): GiveawayCompleted
    {
        $this->giveaway_message = $giveaway_message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'winner_count' => $this->winner_count,
            'unclaimed_prize_count' => $this->unclaimed_prize_count,
            'giveaway_message' => $this->giveaway_message?->toArray(),
        ];
    }
}
