<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\GameHighScore;

// region CLASS_GetGameHighScoresResponse
class GetGameHighScoresResponse extends AbstractResponse
{
    /**
     * @param RawResponse          $rawResponse
     * @param GameHighScore[]|null $gameHighScores
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?array $gameHighScores = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getGameHighScores(): ?array
    {
        return $this->gameHighScores;
    }
}

// endregion CLASS_GetGameHighScoresResponse
