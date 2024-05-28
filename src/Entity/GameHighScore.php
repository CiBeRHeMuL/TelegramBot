<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents one row of the high scores table for a game.
 * @link https://core.telegram.org/bots/api#gamehighscore
 */
class GameHighScore implements EntityInterface
{
    /**
     * @param int $position Position in high score table for the game
     * @param User $user User
     * @param int $score Score
     */
    public function __construct(
        private int $position,
        private User $user,
        private int $score,
    ) {
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): GameHighScore
    {
        $this->position = $position;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): GameHighScore
    {
        $this->user = $user;
        return $this;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $score): GameHighScore
    {
        $this->score = $score;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'position' => $this->position,
            'user' => $this->user->toArray(),
            'score' => $this->score,
        ];
    }
}
