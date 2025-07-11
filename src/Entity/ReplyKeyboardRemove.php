<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard and display the default
 * letter-keyboard. By default, custom keyboards are displayed until a new keyboard is sent by a bot. An exception is made for
 * one-time keyboards that are hidden immediately after the user presses a button (see ReplyKeyboardMarkup). Not supported in
 * channels and for messages sent on behalf of a Telegram Business account.
 * @link https://core.telegram.org/bots/api#replykeyboardremove
 * @see ReplyKeyboardMarkup
 */
class ReplyKeyboardRemove extends AbstractEntity
{
    /**
     * @param bool $remove_keyboard Requests clients to remove the custom keyboard (user will not be able to summon this keyboard;
     * if you want to hide the keyboard from sight but keep it accessible, use one_time_keyboard in ReplyKeyboardMarkup)
     * @param bool|null $selective Optional. Use this parameter if you want to remove the keyboard for specific users only. Targets:
     * 1) users that are \@mentioned in the text of the Message object; 2) if the bot's message is a reply to a message in the same
     * chat and forum topic, sender of the original message.
     * Example: A user votes in a poll, bot returns confirmation message in
     * reply to the vote and removes the keyboard for that user, while still showing the keyboard with poll options to users who
     * haven't voted yet.
     */
    public function __construct(
        protected bool $remove_keyboard,
        protected bool|null $selective = null,
    ) {
        parent::__construct();
    }

    public function getRemoveKeyboard(): bool
    {
        return $this->remove_keyboard;
    }

    public function setRemoveKeyboard(bool $remove_keyboard): ReplyKeyboardRemove
    {
        $this->remove_keyboard = $remove_keyboard;
        return $this;
    }

    public function getSelective(): bool|null
    {
        return $this->selective;
    }

    public function setSelective(bool|null $selective): ReplyKeyboardRemove
    {
        $this->selective = $selective;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'remove_keyboard' => $this->remove_keyboard,
            'selective' => $this->selective,
        ];
    }
}
