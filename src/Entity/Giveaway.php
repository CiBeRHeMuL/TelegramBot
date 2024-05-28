<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\CountryCodeEnum;
use stdClass;

/**
 * This object represents a message about a scheduled giveaway.
 * @link https://core.telegram.org/bots/api#giveaway
 */
class Giveaway implements EntityInterface
{
    /**
     * @param Chat[] $chats Array of Chat. The list of chats which the user must join to participate in the giveaway.
     * @param int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway will be selected.
     * @param int $winner_count The number of users which are supposed to be selected as winners of the giveaway.
     * @param bool $only_new_members Optional. True, if only users who join the chats after the giveaway started should be eligible to win.
     * @param bool $has_public_winners Optional. True, if the list of giveaway winners will be visible to everyone.
     * @param string|null $prize_description Optional. Description of additional giveaway prize.
     * @param CountryCodeEnum[]|null $country_codes Optional.
     * A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which
     * eligible users for the giveaway must come.
     * If empty, then all users can participate in the giveaway.
     * Users with a phone number that was bought on Fragment can always participate in giveaways.
     * @param int|null $premium_subscription_month_count Optional.
     * The number of months the Telegram Premium subscription won from the giveaway will be active for.
     */
    public function __construct(
        #[ArrayType(Chat::class)] private array $chats,
        private int $winners_selection_date,
        private int $winner_count,
        private bool|null $only_new_members = null,
        private bool|null $has_public_winners = null,
        private string|null $prize_description = null,
        #[ArrayType(CountryCodeEnum::class)] private array|null $country_codes = null,
        private int|null $premium_subscription_month_count = null,
    ) {
    }

    public function getChats(): array
    {
        return $this->chats;
    }

    public function setChats(array $chats): Giveaway
    {
        $this->chats = $chats;
        return $this;
    }

    public function getWinnersSelectionDate(): int
    {
        return $this->winners_selection_date;
    }

    public function setWinnersSelectionDate(int $winners_selection_date): Giveaway
    {
        $this->winners_selection_date = $winners_selection_date;
        return $this;
    }

    public function getWinnerCount(): int
    {
        return $this->winner_count;
    }

    public function setWinnerCount(int $winner_count): Giveaway
    {
        $this->winner_count = $winner_count;
        return $this;
    }

    public function isOnlyNewMembers(): bool
    {
        return $this->only_new_members;
    }

    public function setOnlyNewMembers(bool $only_new_members): Giveaway
    {
        $this->only_new_members = $only_new_members;
        return $this;
    }

    public function isHasPublicWinners(): bool
    {
        return $this->has_public_winners;
    }

    public function setHasPublicWinners(bool $has_public_winners): Giveaway
    {
        $this->has_public_winners = $has_public_winners;
        return $this;
    }

    public function getPrizeDescription(): string|null
    {
        return $this->prize_description;
    }

    public function setPrizeDescription(string|null $prize_description): Giveaway
    {
        $this->prize_description = $prize_description;
        return $this;
    }

    public function getCountryCodes(): array|null
    {
        return $this->country_codes;
    }

    public function setCountryCodes(array|null $country_codes): Giveaway
    {
        $this->country_codes = $country_codes;
        return $this;
    }

    public function getPremiumSubscriptionMonthCount(): int|null
    {
        return $this->premium_subscription_month_count;
    }

    public function setPremiumSubscriptionMonthCount(int|null $premium_subscription_month_count): Giveaway
    {
        $this->premium_subscription_month_count = $premium_subscription_month_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chats' => array_map(fn(Chat $chat) => $chat->toArray(), $this->chats),
            'winners_selection_date' => $this->winners_selection_date,
            'winner_count' => $this->winner_count,
            'only_new_members' => $this->only_new_members,
            'has_public_winners' => $this->has_public_winners,
            'prize_description' => $this->prize_description,
            'country_codes' => $this->country_codes !== null
                ? array_map(fn(CountryCodeEnum $c) => $c->value, $this->country_codes)
                : null,
            'premium_subscription_month_count' => $this->premium_subscription_month_count,
        ];
    }
}
