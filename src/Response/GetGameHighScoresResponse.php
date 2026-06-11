<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\GameHighScore;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getGameHighScores method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get game high scores, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result([])┐ → ◇ isOk()? : ⊕ GameHighScore[]

// region CLASS_GetGameHighScoresResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
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
