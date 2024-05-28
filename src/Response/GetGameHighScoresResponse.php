<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\GameHighScore;

class GetGameHighScoresResponse extends AbstractResponse
{
    /**
     * @param RawResponse $rawResponse
     * @param GameHighScore[]|null $gameHighScores
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly array|null $gameHighScores,
    ) {
        parent::__construct($rawResponse);
    }

    public function getGameHighScores(): array|null
    {
        return $this->gameHighScores;
    }
}
