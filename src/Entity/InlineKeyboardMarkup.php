<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

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
     * @param bool|null                $force_reply     Optional. Pass True if the reply interface must be shown to the user, as if they had
     *                                                  manually selected the bot's message and tapped 'Reply'
     *
     * @see https://core.telegram.org/bots/api#inlinekeyboardbutton InlineKeyboardButton
     */
    public function __construct(
        #[ArrayType(new ArrayType(InlineKeyboardButton::class))]
        protected array $inline_keyboard,
        protected ?bool $force_reply = null,
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

    /**
     * @return bool|null
     */
    public function getForceReply(): ?bool
    {
        return $this->force_reply;
    }

    /**
     * @param bool|null $force_reply
     *
     * @return InlineKeyboardMarkup
     */
    public function setForceReply(?bool $force_reply): InlineKeyboardMarkup
    {
        $this->force_reply = $force_reply;

        return $this;
    }
}

// endregion CLASS_InlineKeyboardMarkup
