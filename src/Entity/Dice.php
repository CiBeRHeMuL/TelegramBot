<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\DiceEmojiEnum;

/**
 * This object represents an animated emoji that displays a random value.
 *
 * @link https://core.telegram.org/bots/api#dice
 */
final class Dice implements EntityInterface
{
    /**
     * @param DiceEmojiEnum $emoji Emoji on which the dice throw animation is based
     * @param int $value Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and “⚽”
     * base emoji, 1-64 for “🎰” base emoji
     */
    public function __construct(
        protected DiceEmojiEnum $emoji,
        protected int $value,
    ) {
    }

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
