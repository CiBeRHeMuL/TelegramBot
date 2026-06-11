<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents one row of the high scores table for a game.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#gamehighscore
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: GameHighScore, high score, game, Telegram Bot API
// STRUCTURE: ┌position, user, score┐ → ∑ GameHighScore
// region CLASS_GameHighScore
/**
 * This object represents one row of the high scores table for a game.
 *
 * @see https://core.telegram.org/bots/api#gamehighscore
 */
final class GameHighScore implements EntityInterface
{
    /**
     * @param int  $position Position in high score table for the game
     * @param User $user     User
     * @param int  $score    Score
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected int $position,
        protected User $user,
        protected int $score,
    ) {}

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     *
     * @return GameHighScore
     */
    public function setPosition(int $position): GameHighScore
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return GameHighScore
     */
    public function setUser(User $user): GameHighScore
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     *
     * @return GameHighScore
     */
    public function setScore(int $score): GameHighScore
    {
        $this->score = $score;

        return $this;
    }
}
// endregion CLASS_GameHighScore
