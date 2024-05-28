<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\DiceEmojiEnum;
use stdClass;

/**
 * This object represents an animated emoji that displays a random value.
 * @link https://core.telegram.org/bots/api#dice
 */
class Dice implements EntityInterface
{
    /**
     * @param DiceEmojiEnum $emoji Emoji on which the dice throw animation is based
     * @param int $value Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji
     */
    public function __construct(
        private DiceEmojiEnum $emoji,
        private int $value,
    ) {
    }

    public function getEmoji(): DiceEmojiEnum
    {
        return $this->emoji;
    }

    public function setEmoji(DiceEmojiEnum $emoji): Dice
    {
        $this->emoji = $emoji;
        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): Dice
    {
        $this->value = $value;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'emoji' => $this->emoji->value,
            'value' => $this->value,
        ];
    }
}
