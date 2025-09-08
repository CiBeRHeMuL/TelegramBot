<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\InlineQueryResultTypeEnum;

/**
 * Represents a Game.
 *
 * @see https://core.telegram.org/bots/api#games Game
 * @link https://core.telegram.org/bots/api#inlinequeryresultgame
 */
#[BuildIf(new FieldIsChecker('type', InlineQueryResultTypeEnum::Game))]
final class InlineQueryResultGame extends AbstractInlineQueryResult
{
    /**
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $game_short_name Short name of the game
     * @param InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message
     *
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards Inline keyboard
     */
    public function __construct(
        protected string $id,
        protected string $game_short_name,
        protected ?InlineKeyboardMarkup $reply_markup = null,
    ) {
        parent::__construct(InlineQueryResultTypeEnum::Game);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return InlineQueryResultGame
     */
    public function setId(string $id): InlineQueryResultGame
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getGameShortName(): string
    {
        return $this->game_short_name;
    }

    /**
     * @param string $game_short_name
     *
     * @return InlineQueryResultGame
     */
    public function setGameShortName(string $game_short_name): InlineQueryResultGame
    {
        $this->game_short_name = $game_short_name;
        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    /**
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return InlineQueryResultGame
     */
    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultGame
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }
}
