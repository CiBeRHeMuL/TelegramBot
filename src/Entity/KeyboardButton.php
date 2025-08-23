<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents one button of the reply keyboard.
 * For simple text buttons, String can be used instead of this object to specify the button text.
 * The optional fields web_app, request_users, request_chat, request_contact, request_location, and request_poll are mutually exclusive.
 *
 * Note: request_users and request_chat options will only work in Telegram versions released after 3 February, 2023.
 * Older clients will display unsupported message.
 * @link https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButton extends AbstractEntity
{
    /**
     * @param string $text Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
     * @param KeyboardButtonRequestUsers|null $request_users Optional. If specified, pressing the button will open a list of suitable users.
     * Identifiers of selected users will be sent to the bot in a “users_shared” service message. Available in private chats only.
     * @param KeyboardButtonRequestChat|null $request_chat Optional. If specified, pressing the button will open a list of suitable chats.
     * Tapping on a chat will send its identifier to the bot in a “chat_shared” service message. Available in private chats only.
     * @param bool|null $request_contact Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
     * Available in private chats only.
     * @param bool|null $request_location Optional. If True, the user's current location will be sent when the button is pressed.
     * Available in private chats only.
     * @param KeyboardButtonPollType|null $request_poll Optional. If specified,
     * the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only.
     * @param WebAppInfo|null $web_app Optional. If specified, the described Web App will be launched when the button is pressed.
     * The Web App will be able to send a “web_app_data” service message. Available in private chats only.
     */
    public function __construct(
        protected string $text,
        protected KeyboardButtonRequestUsers|null $request_users = null,
        protected KeyboardButtonRequestChat|null $request_chat = null,
        protected bool|null $request_contact = null,
        protected bool|null $request_location = null,
        protected KeyboardButtonPollType|null $request_poll = null,
        protected WebAppInfo|null $web_app = null,
    ) {
        parent::__construct();
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): KeyboardButton
    {
        $this->text = $text;
        return $this;
    }

    public function getRequestUsers(): KeyboardButtonRequestUsers|null
    {
        return $this->request_users;
    }

    public function setRequestUsers(KeyboardButtonRequestUsers|null $request_users): KeyboardButton
    {
        $this->request_users = $request_users;
        return $this;
    }

    public function getRequestChat(): KeyboardButtonRequestChat|null
    {
        return $this->request_chat;
    }

    public function setRequestChat(KeyboardButtonRequestChat|null $request_chat): KeyboardButton
    {
        $this->request_chat = $request_chat;
        return $this;
    }

    public function getRequestContact(): bool|null
    {
        return $this->request_contact;
    }

    public function setRequestContact(bool|null $request_contact): KeyboardButton
    {
        $this->request_contact = $request_contact;
        return $this;
    }

    public function getRequestLocation(): bool|null
    {
        return $this->request_location;
    }

    public function setRequestLocation(bool|null $request_location): KeyboardButton
    {
        $this->request_location = $request_location;
        return $this;
    }

    public function getRequestPoll(): KeyboardButtonPollType|null
    {
        return $this->request_poll;
    }

    public function setRequestPoll(KeyboardButtonPollType|null $request_poll): KeyboardButton
    {
        $this->request_poll = $request_poll;
        return $this;
    }

    public function getWebApp(): WebAppInfo|null
    {
        return $this->web_app;
    }

    public function setWebApp(WebAppInfo|null $web_app): KeyboardButton
    {
        $this->web_app = $web_app;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'text' => $this->text,
            'request_users' => $this->request_users?->toArray(),
            'request_chat' => $this->request_chat?->toArray(),
            'request_contact' => $this->request_contact,
            'request_location' => $this->request_location,
            'request_poll' => $this->request_poll?->toArray(),
            'web_app' => $this->web_app?->toArray(),
        ];
    }
}
