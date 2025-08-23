<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\CallbackData;
use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * This object represents one button of an inline keyboard. You must use exactly one of the optional fields.
 * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
class InlineKeyboardButton extends AbstractEntity
{
    /**
     * @param string $text Label text on the button
     * @param CallbackData|null $callback_data Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes.
     * @param CallbackGame|null $callback_game Optional. Description of the game that will be launched when the user presses the
     * button.NOTE: This type of button must always be the first button in the first row.
     * @param LoginUrl|null $login_url Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement
     * for the Telegram Login Widget.
     * @param bool|null $pay Optional. Specify True, to send a Pay button.NOTE: This type of button must always be the first button
     * in the first row and can only be used in invoice messages.
     * @param string|null $switch_inline_query Optional. If set, pressing the button will prompt the user to select one of their
     * chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which
     * case just the bot's username will be inserted. Not supported for messages sent on behalf of a Telegram Business account.
     * @param SwitchInlineQueryChosenChat|null $switch_inline_query_chosen_chat Optional. If set, pressing the button will prompt
     * the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified
     * inline query in the input field. Not supported for messages sent on behalf of a Telegram Business account.
     * @param string|null $switch_inline_query_current_chat Optional. If set, pressing the button will insert the bot's username
     * and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will
     * be inserted.This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting something
     * from multiple options. Not supported in channels and for messages sent on behalf of a Telegram Business account.
     * @param Url|null $url Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id>
     * can be used to mention a user by their identifier without using a username, if this is allowed by their privacy settings.
     * @param WebAppInfo|null $web_app Optional. Description of the Web App that will be launched when the user presses the button.
     * The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available
     * only in private chats between a user and the bot. Not supported for messages sent on behalf of a Telegram Business account.
     * @param CopyTextButton|null $copy_text Optional. Description of the button that copies the specified text to the clipboard.
     */
    public function __construct(
        protected string $text,
        protected CallbackData|null $callback_data = null,
        protected CallbackGame|null $callback_game = null,
        protected LoginUrl|null $login_url = null,
        protected bool|null $pay = null,
        protected string|null $switch_inline_query = null,
        protected SwitchInlineQueryChosenChat|null $switch_inline_query_chosen_chat = null,
        protected string|null $switch_inline_query_current_chat = null,
        protected Url|null $url = null,
        protected WebAppInfo|null $web_app = null,
        protected CopyTextButton|null $copy_text = null,
    ) {
        parent::__construct();
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): InlineKeyboardButton
    {
        $this->text = $text;
        return $this;
    }

    public function getCallbackData(): CallbackData|null
    {
        return $this->callback_data;
    }

    public function setCallbackData(CallbackData|null $callback_data): InlineKeyboardButton
    {
        $this->callback_data = $callback_data;
        return $this;
    }

    public function getCallbackGame(): CallbackGame|null
    {
        return $this->callback_game;
    }

    public function setCallbackGame(CallbackGame|null $callback_game): InlineKeyboardButton
    {
        $this->callback_game = $callback_game;
        return $this;
    }

    public function getLoginUrl(): LoginUrl|null
    {
        return $this->login_url;
    }

    public function setLoginUrl(LoginUrl|null $login_url): InlineKeyboardButton
    {
        $this->login_url = $login_url;
        return $this;
    }

    public function getPay(): bool|null
    {
        return $this->pay;
    }

    public function setPay(bool|null $pay): InlineKeyboardButton
    {
        $this->pay = $pay;
        return $this;
    }

    public function getSwitchInlineQuery(): string|null
    {
        return $this->switch_inline_query;
    }

    public function setSwitchInlineQuery(string|null $switch_inline_query): InlineKeyboardButton
    {
        $this->switch_inline_query = $switch_inline_query;
        return $this;
    }

    public function getSwitchInlineQueryChosenChat(): SwitchInlineQueryChosenChat|null
    {
        return $this->switch_inline_query_chosen_chat;
    }

    public function setSwitchInlineQueryChosenChat(SwitchInlineQueryChosenChat|null $switch_inline_query_chosen_chat): InlineKeyboardButton
    {
        $this->switch_inline_query_chosen_chat = $switch_inline_query_chosen_chat;
        return $this;
    }

    public function getSwitchInlineQueryCurrentChat(): string|null
    {
        return $this->switch_inline_query_current_chat;
    }

    public function setSwitchInlineQueryCurrentChat(string|null $switch_inline_query_current_chat): InlineKeyboardButton
    {
        $this->switch_inline_query_current_chat = $switch_inline_query_current_chat;
        return $this;
    }

    public function getUrl(): Url|null
    {
        return $this->url;
    }

    public function setUrl(Url|null $url): InlineKeyboardButton
    {
        $this->url = $url;
        return $this;
    }

    public function getWebApp(): WebAppInfo|null
    {
        return $this->web_app;
    }

    public function setWebApp(WebAppInfo|null $web_app): InlineKeyboardButton
    {
        $this->web_app = $web_app;
        return $this;
    }

    public function getCopyText(): CopyTextButton|null
    {
        return $this->copy_text;
    }

    public function setCopyText(CopyTextButton|null $copy_text): InlineKeyboardButton
    {
        $this->copy_text = $copy_text;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'text' => $this->text,
            'callback_data' => $this->callback_data?->getData(),
            'callback_game' => $this->callback_game?->toArray(),
            'login_url' => $this->login_url?->toArray(),
            'pay' => $this->pay,
            'switch_inline_query' => $this->switch_inline_query,
            'switch_inline_query_chosen_chat' => $this->switch_inline_query_chosen_chat?->toArray(),
            'switch_inline_query_current_chat' => $this->switch_inline_query_current_chat,
            'url' => $this->url?->getUrl(),
            'web_app' => $this->web_app?->toArray(),
            'copy_text' => $this->copy_text?->toArray(),
        ];
    }
}
