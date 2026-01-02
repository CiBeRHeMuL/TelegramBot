<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object represents a custom keyboard with reply options (see Introduction to bots for details and examples). Not supported
 * in channels and for messages sent on behalf of a Telegram Business account.
 *
 * @see https://core.telegram.org/bots/features#keyboards Introduction to bots
 * @link https://core.telegram.org/bots/api#replykeyboardmarkup
 */
final class ReplyKeyboardMarkup implements EntityInterface
{
    /**
     * @param KeyboardButton[][] $keyboard Array of button rows, each represented by an Array of KeyboardButton objects
     * @param bool|null $is_persistent Optional. Requests clients to always show the keyboard when the regular keyboard is hidden.
     * Defaults to false, in which case the custom keyboard can be hidden and opened with a keyboard icon.
     * @param bool|null $resize_keyboard Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make
     * the keyboard smaller if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always
     * of the same height as the app's standard keyboard.
     * @param bool|null $one_time_keyboard Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard
     * will still be available, but clients will automatically display the usual letter-keyboard in the chat - the user can press
     * a special button in the input field to see the custom keyboard again. Defaults to false.
     * @param string|null $input_field_placeholder Optional. The placeholder to be shown in the input field when the keyboard is
     * active; 1-64 characters
     * @param bool|null $selective Optional. Use this parameter if you want to show the keyboard to specific users only. Targets:
     * 1) users that are \@mentioned in the text of the Message object; 2) if the bot's message is a reply to a message in the same
     * chat and forum topic, sender of the original message.Example: A user requests to change the bot's language, bot replies to
     * the request with a keyboard to select the new language. Other users in the group don't see the keyboard.
     *
     * @see https://core.telegram.org/bots/api#keyboardbutton KeyboardButton
     * @see https://core.telegram.org/bots/api#message Message
     */
    public function __construct(
        #[ArrayType(new ArrayType(KeyboardButton::class))]
        protected array $keyboard,
        protected ?bool $is_persistent = null,
        protected ?bool $resize_keyboard = null,
        protected ?bool $one_time_keyboard = null,
        protected ?string $input_field_placeholder = null,
        protected ?bool $selective = null,
    ) {}

    /**
     * @return KeyboardButton[][]
     */
    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    /**
     * @param KeyboardButton[][] $keyboard
     *
     * @return ReplyKeyboardMarkup
     */
    public function setKeyboard(array $keyboard): ReplyKeyboardMarkup
    {
        $this->keyboard = $keyboard;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsPersistent(): ?bool
    {
        return $this->is_persistent;
    }

    /**
     * @param bool|null $is_persistent
     *
     * @return ReplyKeyboardMarkup
     */
    public function setIsPersistent(?bool $is_persistent): ReplyKeyboardMarkup
    {
        $this->is_persistent = $is_persistent;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getResizeKeyboard(): ?bool
    {
        return $this->resize_keyboard;
    }

    /**
     * @param bool|null $resize_keyboard
     *
     * @return ReplyKeyboardMarkup
     */
    public function setResizeKeyboard(?bool $resize_keyboard): ReplyKeyboardMarkup
    {
        $this->resize_keyboard = $resize_keyboard;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOneTimeKeyboard(): ?bool
    {
        return $this->one_time_keyboard;
    }

    /**
     * @param bool|null $one_time_keyboard
     *
     * @return ReplyKeyboardMarkup
     */
    public function setOneTimeKeyboard(?bool $one_time_keyboard): ReplyKeyboardMarkup
    {
        $this->one_time_keyboard = $one_time_keyboard;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInputFieldPlaceholder(): ?string
    {
        return $this->input_field_placeholder;
    }

    /**
     * @param string|null $input_field_placeholder
     *
     * @return ReplyKeyboardMarkup
     */
    public function setInputFieldPlaceholder(?string $input_field_placeholder): ReplyKeyboardMarkup
    {
        $this->input_field_placeholder = $input_field_placeholder;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }

    /**
     * @param bool|null $selective
     *
     * @return ReplyKeyboardMarkup
     */
    public function setSelective(?bool $selective): ReplyKeyboardMarkup
    {
        $this->selective = $selective;
        return $this;
    }
}
