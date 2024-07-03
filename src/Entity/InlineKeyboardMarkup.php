<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 * @link https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends AbstractEntity
{
    /**
     * @param InlineKeyboardButton[][] $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
     */
    public function __construct(
        #[ArrayType(new ArrayType(InlineKeyboardButton::class))] protected array $inline_keyboard,
    ) {
        parent::__construct();
    }

    public function getInlineKeyboard(): array
    {
        return $this->inline_keyboard;
    }

    public function setInlineKeyboard(array $inline_keyboard): InlineKeyboardMarkup
    {
        $this->inline_keyboard = $inline_keyboard;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'inline_keyboard' => array_map(
                fn(array $row) => array_map(
                    fn(InlineKeyboardButton $button) => $button->toArray(),
                    $row,
                ),
                $this->inline_keyboard,
            ),
        ];
    }
}
