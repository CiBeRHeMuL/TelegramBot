<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represents a message about the completion of a giveaway with public winners.
 *
 * @link https://core.telegram.org/bots/api#giveawaywinners
 */
class GiveawayWinners extends AbstractEntity
{
    /**
     * @param Chat $chat The chat that created the giveaway
     * @param int $giveaway_message_id Identifier of the message with the giveaway in the chat
     * @param int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway were selected
     * @param int $winner_count Total number of winners in the giveaway
     * @param User[] $winners List of up to 100 winners of the giveaway
     * @param int|null $additional_chat_count Optional. The number of other chats the user had to join in order to be eligible for
     * the giveaway
     * @param int|null $premium_subscription_month_count Optional. The number of months the Telegram Premium subscription won from
     * the giveaway will be active for; for Telegram Premium giveaways only
     * @param int|null $unclaimed_prize_count Optional. Number of undistributed prizes
     * @param bool|null $only_new_members Optional. True, if only users who had joined the chats after the giveaway started were
     * eligible to win
     * @param bool|null $was_refunded Optional. True, if the giveaway was canceled because the payment for it was refunded
     * @param string|null $prize_description Optional. Description of additional giveaway prize
     * @param int|null $prize_star_count Optional. The number of Telegram Stars that were split between giveaway winners; for Telegram
     * Star giveaways only
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected Chat $chat,
        protected int $giveaway_message_id,
        protected int $winners_selection_date,
        protected int $winner_count,
        #[ArrayType(User::class)]
        protected array $winners,
        protected int|null $additional_chat_count = null,
        protected int|null $premium_subscription_month_count = null,
        protected int|null $unclaimed_prize_count = null,
        protected bool|null $only_new_members = null,
        protected bool|null $was_refunded = null,
        protected string|null $prize_description = null,
        protected int|null $prize_star_count = null,
    ) {
        parent::__construct();
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     *
     * @return GiveawayWinners
     */
    public function setChat(Chat $chat): GiveawayWinners
    {
        $this->chat = $chat;
        return $this;
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
     * @return GiveawayWinners
     */
    public function setGiveawayMessageId(int $giveaway_message_id): GiveawayWinners
    {
        $this->giveaway_message_id = $giveaway_message_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getWinnersSelectionDate(): int
    {
        return $this->winners_selection_date;
    }

    /**
     * @param int $winners_selection_date
     *
     * @return GiveawayWinners
     */
    public function setWinnersSelectionDate(int $winners_selection_date): GiveawayWinners
    {
        $this->winners_selection_date = $winners_selection_date;
        return $this;
    }

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
     * @return GiveawayWinners
     */
    public function setWinnerCount(int $winner_count): GiveawayWinners
    {
        $this->winner_count = $winner_count;
        return $this;
    }

    /**
     * @return User[]
     */
    public function getWinners(): array
    {
        return $this->winners;
    }

    /**
     * @param User[] $winners
     *
     * @return GiveawayWinners
     */
    public function setWinners(array $winners): GiveawayWinners
    {
        $this->winners = $winners;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAdditionalChatCount(): int|null
    {
        return $this->additional_chat_count;
    }

    /**
     * @param int|null $additional_chat_count
     *
     * @return GiveawayWinners
     */
    public function setAdditionalChatCount(int|null $additional_chat_count): GiveawayWinners
    {
        $this->additional_chat_count = $additional_chat_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPremiumSubscriptionMonthCount(): int|null
    {
        return $this->premium_subscription_month_count;
    }

    /**
     * @param int|null $premium_subscription_month_count
     *
     * @return GiveawayWinners
     */
    public function setPremiumSubscriptionMonthCount(int|null $premium_subscription_month_count): GiveawayWinners
    {
        $this->premium_subscription_month_count = $premium_subscription_month_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnclaimedPrizeCount(): int|null
    {
        return $this->unclaimed_prize_count;
    }

    /**
     * @param int|null $unclaimed_prize_count
     *
     * @return GiveawayWinners
     */
    public function setUnclaimedPrizeCount(int|null $unclaimed_prize_count): GiveawayWinners
    {
        $this->unclaimed_prize_count = $unclaimed_prize_count;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOnlyNewMembers(): bool|null
    {
        return $this->only_new_members;
    }

    /**
     * @param bool|null $only_new_members
     *
     * @return GiveawayWinners
     */
    public function setOnlyNewMembers(bool|null $only_new_members): GiveawayWinners
    {
        $this->only_new_members = $only_new_members;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getWasRefunded(): bool|null
    {
        return $this->was_refunded;
    }

    /**
     * @param bool|null $was_refunded
     *
     * @return GiveawayWinners
     */
    public function setWasRefunded(bool|null $was_refunded): GiveawayWinners
    {
        $this->was_refunded = $was_refunded;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrizeDescription(): string|null
    {
        return $this->prize_description;
    }

    /**
     * @param string|null $prize_description
     *
     * @return GiveawayWinners
     */
    public function setPrizeDescription(string|null $prize_description): GiveawayWinners
    {
        $this->prize_description = $prize_description;
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
     * @return GiveawayWinners
     */
    public function setPrizeStarCount(int|null $prize_star_count): GiveawayWinners
    {
        $this->prize_star_count = $prize_star_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat' => $this->chat->toArray(),
            'giveaway_message_id' => $this->giveaway_message_id,
            'winners_selection_date' => $this->winners_selection_date,
            'winner_count' => $this->winner_count,
            'winners' => array_map(fn(User $e) => $e->toArray(), $this->winners),
            'additional_chat_count' => $this->additional_chat_count,
            'premium_subscription_month_count' => $this->premium_subscription_month_count,
            'unclaimed_prize_count' => $this->unclaimed_prize_count,
            'only_new_members' => $this->only_new_members,
            'was_refunded' => $this->was_refunded,
            'prize_description' => $this->prize_description,
            'prize_star_count' => $this->prize_star_count,
        ];
    }
}
