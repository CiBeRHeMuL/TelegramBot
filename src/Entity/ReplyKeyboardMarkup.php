<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represents a custom keyboard with reply options (see Introduction to bots for details and examples).
 * Not supported in channels and for messages sent on behalf of a Telegram Business account.
 * @link https://core.telegram.org/bots/api#replykeyboardmarkup
 * @link https://core.telegram.org/bots/features#keyboards
 */
class ReplyKeyboardMarkup extends AbstractEntity
{
    /**
     * @param KeyboardButton[][] $keyboard Array of button rows, each represented by an Array of KeyboardButton objects
     * @param bool|null $is_persistent Optional. Requests clients to always show the keyboard when the regular keyboard is hidden.
     * Defaults to false, in which case the custom keyboard can be hidden and opened with a keyboard icon.
     * @param bool|null $resize_keyboard Optional. Requests clients to resize the keyboard vertically for optimal fit
     * (e.g., make the keyboard smaller if there are just two rows of buttons).
     * Defaults to false, in which case the custom keyboard is always of the same height as the app's standard keyboard.
     * @param bool|null $one_time_keyboard Optional. Requests clients to hide the keyboard as soon as it's been used.
     * The keyboard will still be available, but clients will automatically display the usual
     * letter-keyboard in the chat - the user can press a special button in the input field to see the custom keyboard again. Defaults to false.
     * @param string|null $input_field_placeholder Optional. The placeholder to be shown in the input field when the keyboard is active;
     * 1-64 characters
     * @param bool|null $selective Optional. Use this parameter if you want to show the keyboard to specific users only. Targets:
     * 1) users that are @mentioned in the text of the Message object;
     * 2) if the bot's message is a reply to a message in the same chat and forum topic, sender of the original message.
     */
    public function __construct(
        #[ArrayType(new ArrayType(KeyboardButton::class))] protected array $keyboard,
        protected bool|null $is_persistent = null,
        protected bool|null $resize_keyboard = null,
        protected bool|null $one_time_keyboard = null,
        protected string|null $input_field_placeholder = null,
        protected bool|null $selective = null,
    ) {
        parent::__construct();
    }

    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    public function setKeyboard(array $keyboard): ReplyKeyboardMarkup
    {
        $this->keyboard = $keyboard;
        return $this;
    }

    public function getIsPersistent(): bool|null
    {
        return $this->is_persistent;
    }

    public function setIsPersistent(bool|null $is_persistent): ReplyKeyboardMarkup
    {
        $this->is_persistent = $is_persistent;
        return $this;
    }

    public function getResizeKeyboard(): bool|null
    {
        return $this->resize_keyboard;
    }

    public function setResizeKeyboard(bool|null $resize_keyboard): ReplyKeyboardMarkup
    {
        $this->resize_keyboard = $resize_keyboard;
        return $this;
    }

    public function getOneTimeKeyboard(): bool|null
    {
        return $this->one_time_keyboard;
    }

    public function setOneTimeKeyboard(bool|null $one_time_keyboard): ReplyKeyboardMarkup
    {
        $this->one_time_keyboard = $one_time_keyboard;
        return $this;
    }

    public function getInputFieldPlaceholder(): string|null
    {
        return $this->input_field_placeholder;
    }

    public function setInputFieldPlaceholder(string|null $input_field_placeholder): ReplyKeyboardMarkup
    {
        $this->input_field_placeholder = $input_field_placeholder;
        return $this;
    }

    public function getSelective(): bool|null
    {
        return $this->selective;
    }

    public function setSelective(bool|null $selective): ReplyKeyboardMarkup
    {
        $this->selective = $selective;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'keyboard' => array_map(
                fn(array $row) => array_map(
                    fn(KeyboardButton $button) => $button->toArray(),
                    $row,
                ),
                $this->keyboard,
            ),
            'is_persistent' => $this->is_persistent,
            'resize_keyboard' => $this->resize_keyboard,
            'one_time_keyboard' => $this->one_time_keyboard,
            'input_field_placeholder' => $this->input_field_placeholder,
            'selective' => $this->selective,
        ];
    }
}
