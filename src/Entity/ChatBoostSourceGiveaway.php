<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatBoostSourceEnum;

/**
 * The boost was obtained by the creation of a Telegram Premium or a Telegram Star giveaway. This boosts the chat 4 times for
 * the duration of the corresponding Telegram Premium subscription for Telegram Premium giveaways and prize_star_count / 500
 * times for one year for Telegram Star giveaways.
 *
 * @link https://core.telegram.org/bots/api#chatboostsourcegiveaway
 */
#[BuildIf(new FieldIsChecker('source', ChatBoostSourceEnum::Giveaway->value))]
final class ChatBoostSourceGiveaway extends AbstractChatBoostSource
{
    /**
     * @param int $giveaway_message_id Identifier of a message in the chat with the giveaway; the message could have been deleted
     * already. May be 0 if the message isn't sent yet.
     * @param bool|null $is_unclaimed Optional. True, if the giveaway was completed, but there was no user to win the prize
     * @param User|null $user Optional. User that won the prize in the giveaway if any; for Telegram Premium giveaways only
     * @param int|null $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram
     * Star giveaways only
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected int $giveaway_message_id,
        protected bool|null $is_unclaimed = null,
        protected User|null $user = null,
        protected int|null $prize_star_count = null,
    ) {
        parent::__construct(ChatBoostSourceEnum::Giveaway);
    }

    /**
     * @return int
     */
    public function getGiveawayMessageId(): int
    {
        return $this->giveaway_message_id;
    }

    /**
     * @param int $giveaway_message_id
     *
     * @return ChatBoostSourceGiveaway
     */
    public function setGiveawayMessageId(int $giveaway_message_id): ChatBoostSourceGiveaway
    {
        $this->giveaway_message_id = $giveaway_message_id;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsUnclaimed(): bool|null
    {
        return $this->is_unclaimed;
    }

    /**
     * @param bool|null $is_unclaimed
     *
     * @return ChatBoostSourceGiveaway
     */
    public function setIsUnclaimed(bool|null $is_unclaimed): ChatBoostSourceGiveaway
    {
        $this->is_unclaimed = $is_unclaimed;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): User|null
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return ChatBoostSourceGiveaway
     */
    public function setUser(User|null $user): ChatBoostSourceGiveaway
    {
        $this->user = $user;
        return $this;
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
     * @return ChatBoostSourceGiveaway
     */
    public function setPrizeStarCount(int|null $prize_star_count): ChatBoostSourceGiveaway
    {
        $this->prize_star_count = $prize_star_count;
        return $this;
    }
}
