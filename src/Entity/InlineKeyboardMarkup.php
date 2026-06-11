<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents an inline keyboard that appears right next to the message it belongs to.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inlinekeyboardmarkup
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InlineKeyboardMarkup, Telegram, Bot API, DTO, inlinekeyboardmarkup
// STRUCTURE: ▶ ┌inline_keyboard: InlineKeyboardButton[][]┐ → ∑ InlineKeyboardMarkup
// region CLASS_InlineKeyboardMarkup

/**
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 *
 * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
 * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
final class InlineKeyboardMarkup implements EntityInterface
{
    /**
     * @param InlineKeyboardButton[][] $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton
     *                                                  objects
     *
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

// endregion CLASS_InlineKeyboardMarkup
