<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\DiceEmojiEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents an animated emoji that displays a random value.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#dice
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Dice, animated emoji, random value, Telegram Bot API
// STRUCTURE: ┌emoji, value┐ → ∑ Dice
// region CLASS_Dice
/**
 * This object represents an animated emoji that displays a random value.
 *
 * @see https://core.telegram.org/bots/api#dice
 */
final class Dice implements EntityInterface
{
    /**
     * @param DiceEmojiEnum $emoji Emoji on which the dice throw animation is based
     * @param int           $value Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and “⚽”
     *                             base emoji, 1-64 for “🎰” base emoji
     */
    public function __construct(
        protected DiceEmojiEnum $emoji,
        protected int $value,
    ) {}

    /**
     * @return DiceEmojiEnum
     */
    public function getEmoji(): DiceEmojiEnum
    {
        return $this->emoji;
    }

    /**
     * @param DiceEmojiEnum $emoji
     *
     * @return Dice
     */
    public function setEmoji(DiceEmojiEnum $emoji): Dice
    {
        $this->emoji = $emoji;

        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     *
     * @return Dice
     */
    public function setValue(int $value): Dice
    {
        $this->value = $value;

        return $this;
    }
}
// endregion CLASS_Dice
