<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\CountryCodeEnum;
use stdClass;

/**
 * This object represents a message about a scheduled giveaway.
 *
 * @link https://core.telegram.org/bots/api#giveaway
 */
class Giveaway extends AbstractEntity
{
    /**
     * @param Chat[] $chats The list of chats which the user must join to participate in the giveaway
     * @param int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway will be selected
     * @param int $winner_count The number of users which are supposed to be selected as winners of the giveaway
     * @param bool|null $only_new_members Optional. True, if only users who join the chats after the giveaway started should be eligible
     * to win
     * @param bool|null $has_public_winners Optional. True, if the list of giveaway winners will be visible to everyone
     * @param string|null $prize_description Optional. Description of additional giveaway prize
     * @param CountryCodeEnum[]|null $country_codes Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the
     * countries from which eligible users for the giveaway must come. If empty, then all users can participate in the giveaway.
     * Users with a phone number that was bought on Fragment can always participate in giveaways.
     * @param int|null $premium_subscription_month_count Optional. The number of months the Telegram Premium subscription won from
     * the giveaway will be active for; for Telegram Premium giveaways only
     * @param int|null $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram
     * Star giveaways only
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2 ISO 3166-1 alpha-2
     */
    public function __construct(
        #[ArrayType(Chat::class)]
        protected array $chats,
        protected int $winners_selection_date,
        protected int $winner_count,
        protected bool|null $only_new_members = null,
        protected bool|null $has_public_winners = null,
        protected string|null $prize_description = null,
        #[ArrayType(CountryCodeEnum::class)]
        protected array|null $country_codes = null,
        protected int|null $premium_subscription_month_count = null,
        protected int|null $prize_star_count = null,
    ) {
        parent::__construct();
    }

    /**
     * @return Chat[]
     */
    public function getChats(): array
    {
        return $this->chats;
    }

    /**
     * @param Chat[] $chats
     *
     * @return Giveaway
     */
    public function setChats(array $chats): Giveaway
    {
        $this->chats = $chats;
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
     * @return Giveaway
     */
    public function setWinnersSelectionDate(int $winners_selection_date): Giveaway
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
     * @return Giveaway
     */
    public function setWinnerCount(int $winner_count): Giveaway
    {
        $this->winner_count = $winner_count;
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
     * @return Giveaway
     */
    public function setOnlyNewMembers(bool|null $only_new_members): Giveaway
    {
        $this->only_new_members = $only_new_members;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasPublicWinners(): bool|null
    {
        return $this->has_public_winners;
    }

    /**
     * @param bool|null $has_public_winners
     *
     * @return Giveaway
     */
    public function setHasPublicWinners(bool|null $has_public_winners): Giveaway
    {
        $this->has_public_winners = $has_public_winners;
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
     * @return Giveaway
     */
    public function setPrizeDescription(string|null $prize_description): Giveaway
    {
        $this->prize_description = $prize_description;
        return $this;
    }

    /**
     * @return CountryCodeEnum[]|null
     */
    public function getCountryCodes(): array|null
    {
        return $this->country_codes;
    }

    /**
     * @param CountryCodeEnum[]|null $country_codes
     *
     * @return Giveaway
     */
    public function setCountryCodes(array|null $country_codes): Giveaway
    {
        $this->country_codes = $country_codes;
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
     * @return Giveaway
     */
    public function setPremiumSubscriptionMonthCount(int|null $premium_subscription_month_count): Giveaway
    {
        $this->premium_subscription_month_count = $premium_subscription_month_count;
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
     * @return Giveaway
     */
    public function setPrizeStarCount(int|null $prize_star_count): Giveaway
    {
        $this->prize_star_count = $prize_star_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chats' => array_map(fn(Chat $e) => $e->toArray(), $this->chats),
            'winners_selection_date' => $this->winners_selection_date,
            'winner_count' => $this->winner_count,
            'only_new_members' => $this->only_new_members,
            'has_public_winners' => $this->has_public_winners,
            'prize_description' => $this->prize_description,
            'country_codes' => $this->country_codes !== null
                ? array_map(fn(CountryCodeEnum $e) => $e->value, $this->country_codes)
                : null,
            'premium_subscription_month_count' => $this->premium_subscription_month_count,
            'prize_star_count' => $this->prize_star_count,
        ];
    }
}
