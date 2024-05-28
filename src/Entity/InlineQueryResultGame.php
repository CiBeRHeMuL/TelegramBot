<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;

/**
 * Represents a Game.
 * @link https://core.telegram.org/bots/api#inlinequeryresultgame
 */
#[BuildIf(new FieldIsChecker('type', InlineQueryResultTypeEnum::Game))]
class InlineQueryResultGame extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $game_short_name Short name of the game
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     */
    public function __construct(
        private string $id,
        private string $game_short_name,
        private InlineKeyboardMarkup|null $reply_markup = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Game);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): InlineQueryResultGame
    {
        $this->id = $id;
        return $this;
    }

    public function getGameShortName(): string
    {
        return $this->game_short_name;
    }

    public function setGameShortName(string $game_short_name): InlineQueryResultGame
    {
        $this->game_short_name = $game_short_name;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): InlineQueryResultGame
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'id' => $this->id,
            'game_short_name' => $this->game_short_name,
            'reply_markup' => $this->reply_markup?->toArray(),
        ];
    }
}
