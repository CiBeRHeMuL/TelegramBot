<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object describes the rating of a user based on their Telegram Star spendings.
 *
 * @link https://core.telegram.org/bots/api#userrating
 */
final class UserRating implements EntityInterface
{
    /**
     * @param int $level Current level of the user, indicating their reliability when purchasing digital goods and services. A higher
     * level suggests a more trustworthy customer; a negative level is likely reason for concern.
     * @param int $rating Numerical value of the user's rating; the higher the rating, the better
     * @param int $current_level_rating The rating value required to get the current level
     * @param int|null $next_level_rating Optional. The rating value required to get to the next level; omitted if the maximum level
     * was reached
     */
    public function __construct(
        protected int $level,
        protected int $rating,
        protected int $current_level_rating,
        protected ?int $next_level_rating = null,
    ) {}

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     *
     * @return UserRating
     */
    public function setLevel(int $level): UserRating
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     *
     * @return UserRating
     */
    public function setRating(int $rating): UserRating
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentLevelRating(): int
    {
        return $this->current_level_rating;
    }

    /**
     * @param int $current_level_rating
     *
     * @return UserRating
     */
    public function setCurrentLevelRating(int $current_level_rating): UserRating
    {
        $this->current_level_rating = $current_level_rating;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNextLevelRating(): ?int
    {
        return $this->next_level_rating;
    }

    /**
     * @param int|null $next_level_rating
     *
     * @return UserRating
     */
    public function setNextLevelRating(?int $next_level_rating): UserRating
    {
        $this->next_level_rating = $next_level_rating;
        return $this;
    }
}
