<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 *
 * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
 * @link https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
final class InlineKeyboardMarkup implements EntityInterface
{
    /**
     * @param InlineKeyboardButton[][] $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton
     * objects
     *
     * @see https://core.telegram.org/bots/api#inlinekeyboardbutton InlineKeyboardButton
     * @see https://core.telegram.org/bots/api#inlinekeyboardbutton InlineKeyboardButton
     */
    public function __construct(
        #[ArrayType(new ArrayType(InlineKeyboardButton::class))]
        protected array $inline_keyboard,
    ) {}

    /**
     * @return InlineKeyboardButton[][]
     */
    public function getInlineKeyboard(): array
    {
        return $this->inline_keyboard;
    }

    /**
     * @param InlineKeyboardButton[][] $inline_keyboard
     *
     * @return InlineKeyboardMarkup
     */
    public function setInlineKeyboard(array $inline_keyboard): InlineKeyboardMarkup
    {
        $this->inline_keyboard = $inline_keyboard;
        return $this;
    }
}
