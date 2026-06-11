<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about the creation of a scheduled giveaway.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#giveawaycreated
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: GiveawayCreated, giveaway, created, service message, Telegram Bot API
// STRUCTURE: ┌prize_star_count┐ → ∑ GiveawayCreated
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
