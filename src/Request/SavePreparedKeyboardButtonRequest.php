<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\KeyboardButton;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API savePreparedKeyboardButton method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#savepreparedkeyboardbutton
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Save, Prepared, Keyboard, Button
// STRUCTURE: ▶ ┌button + user_id┐ → ◇ construct → ⊕ → ∑ ⟦SavePreparedKeyboardButtonRequest⟧

// region CLASS_SavePreparedKeyboardButtonRequest
/**
 * @see https://core.telegram.org/bots/api#savepreparedkeyboardbutton
 */
class SavePreparedKeyboardButtonRequest implements RequestInterface
{
    /**
     * @param KeyboardButton $button  A JSON-serialized object describing the button to be saved. The button must be of the type request_users,
     *                                request_chat, or request_managed_bot
     * @param int            $user_id Unique identifier of the target user that can use the button
     *
     * @see https://core.telegram.org/bots/api#keyboardbutton KeyboardButton
     */
    public function __construct(
        private KeyboardButton $button,
        private int $user_id,
    ) {}

    public function getButton(): KeyboardButton
    {
        return $this->button;
    }

    public function setButton(KeyboardButton $button): SavePreparedKeyboardButtonRequest
    {
        $this->button = $button;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): SavePreparedKeyboardButtonRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_SavePreparedKeyboardButtonRequest
