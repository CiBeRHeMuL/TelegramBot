<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use stdClass;

/**
 * This object represents a message about the completion of a giveaway with public winners.
 * @link https://core.telegram.org/bots/api#giveawaywinners
 */
class GiveawayWinners implements EntityInterface
{
    /**
     * @param Chat $chat The chat that created the giveaway.
     * @param int $giveaway_message_id Identifier of the message with the giveaway in the chat.
     * @param int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway were selected.
     * @param int $winner_count Total number of winners in the giveaway.
     * @param User[] $winners List of up to 100 winners of the giveaway.
     * @param int|null $additional_chat_count Optional.
     * The number of other chats the user had to join in order to be eligible for the giveaway.
     * @param int|null $premium_subscription_month_count Optional.
     * The number of months the Telegram Premium subscription won from the giveaway will be active for.
     * @param int|null $unclaimed_prize_count Optional. Number of undistributed prizes.
     * @param bool|null $only_new_members Optional.
     * True, if only users who had joined the chats after the giveaway started were eligible to win.
     * @param bool|null $was_refunded Optional. True, if the giveaway was canceled because the payment for it was refunded.
     * @param string|null $prize_description Optional. Description of additional giveaway prize.
     */
    public function __construct(
        private Chat $chat,
        private int $giveaway_message_id,
        private int $winners_selection_date,
        private int $winner_count,
        #[ArrayType(User::class)] private array $winners,
        private int|null $additional_chat_count = null,
        private int|null $premium_subscription_month_count = null,
        private int|null $unclaimed_prize_count = null,
        private bool|null $only_new_members = null,
        private bool|null $was_refunded = null,
        private string|null $prize_description = null,
    ) {
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): GiveawayWinners
    {
        $this->chat = $chat;
        return $this;
    }

    public function getGiveawayMessageId(): int
    {
        return $this->giveaway_message_id;
    }

    public function setGiveawayMessageId(int $giveaway_message_id): GiveawayWinners
    {
        $this->giveaway_message_id = $giveaway_message_id;
        return $this;
    }

    public function getWinnersSelectionDate(): int
    {
        return $this->winners_selection_date;
    }

    public function setWinnersSelectionDate(int $winners_selection_date): GiveawayWinners
    {
        $this->winners_selection_date = $winners_selection_date;
        return $this;
    }

    public function getWinnerCount(): int
    {
        return $this->winner_count;
    }

    public function setWinnerCount(int $winner_count): GiveawayWinners
    {
        $this->winner_count = $winner_count;
        return $this;
    }

    public function getWinners(): array
    {
        return $this->winners;
    }

    public function setWinners(array $winners): GiveawayWinners
    {
        $this->winners = $winners;
        return $this;
    }

    public function getAdditionalChatCount(): int|null
    {
        return $this->additional_chat_count;
    }

    public function setAdditionalChatCount(int|null $additional_chat_count): GiveawayWinners
    {
        $this->additional_chat_count = $additional_chat_count;
        return $this;
    }

    public function getPremiumSubscriptionMonthCount(): int|null
    {
        return $this->premium_subscription_month_count;
    }

    public function setPremiumSubscriptionMonthCount(int|null $premium_subscription_month_count): GiveawayWinners
    {
        $this->premium_subscription_month_count = $premium_subscription_month_count;
        return $this;
    }

    public function getUnclaimedPrizeCount(): int|null
    {
        return $this->unclaimed_prize_count;
    }

    public function setUnclaimedPrizeCount(int|null $unclaimed_prize_count): GiveawayWinners
    {
        $this->unclaimed_prize_count = $unclaimed_prize_count;
        return $this;
    }

    public function getOnlyNewMembers(): bool|null
    {
        return $this->only_new_members;
    }

    public function setOnlyNewMembers(bool|null $only_new_members): GiveawayWinners
    {
        $this->only_new_members = $only_new_members;
        return $this;
    }

    public function getWasRefunded(): bool|null
    {
        return $this->was_refunded;
    }

    public function setWasRefunded(bool|null $was_refunded): GiveawayWinners
    {
        $this->was_refunded = $was_refunded;
        return $this;
    }

    public function getPrizeDescription(): string|null
    {
        return $this->prize_description;
    }

    public function setPrizeDescription(string|null $prize_description): GiveawayWinners
    {
        $this->prize_description = $prize_description;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat' => $this->chat->toArray(),
            'giveaway_message_id' => $this->giveaway_message_id,
            'winners_selection_date' => $this->winners_selection_date,
            'winner_count' => $this->winner_count,
            'winners' => array_map(fn(User $user) => $user->toArray(), $this->winners),
            'additional_chat_count' => $this->additional_chat_count,
            'premium_subscription_month_count' => $this->premium_subscription_month_count,
            'unclaimed_prize_count' => $this->unclaimed_prize_count,
            'only_new_members' => $this->only_new_members,
            'was_refunded' => $this->was_refunded,
            'prize_description' => $this->prize_description,
        ];
    }
}
