<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\CallbackData;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * This object represents one button of an inline keyboard. Exactly one of the optional fields must be used to specify type of
 * the button.
 *
 * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
final class InlineKeyboardButton implements EntityInterface
{
    /**
     * @param string $text Label text on the button
     * @param CallbackData|null $callback_data Optional. Data to be sent in a callback query to the bot when the button is pressed,
     * 1-64 bytes
     * @param CallbackGame|null $callback_game Optional. Description of the game that will be launched when the user presses the
     * button.NOTE: This type of button must always be the first button in the first row.
     * @param LoginUrl|null $login_url Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement
     * for the Telegram Login Widget.
     * @param bool|null $pay Optional. Specify True, to send a Pay button. Substrings “⭐” and “XTR” in the buttons's text
     * will be replaced with a Telegram Star icon.NOTE: This type of button must always be the first button in the first row and
     * can only be used in invoice messages.
     * @param string|null $switch_inline_query Optional. If set, pressing the button will prompt the user to select one of their
     * chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which
     * case just the bot's username will be inserted. Not supported for messages sent in channel direct messages chats and on behalf
     * of a Telegram Business account.
     * @param SwitchInlineQueryChosenChat|null $switch_inline_query_chosen_chat Optional. If set, pressing the button will prompt
     * the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified
     * inline query in the input field. Not supported for messages sent in channel direct messages chats and on behalf of a Telegram
     * Business account.
     * @param string|null $switch_inline_query_current_chat Optional. If set, pressing the button will insert the bot's username
     * and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will
     * be inserted.This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting something
     * from multiple options. Not supported in channels and for messages sent in channel direct messages chats and on behalf of a
     * Telegram Business account.
     * @param Url|null $url Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can
     * be used to mention a user by their identifier without using a username, if this is allowed by their privacy settings.
     * @param WebAppInfo|null $web_app Optional. Description of the Web App that will be launched when the user presses the button.
     * The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available
     * only in private chats between a user and the bot. Not supported for messages sent on behalf of a Telegram Business account.
     * @param CopyTextButton|null $copy_text Optional. Description of the button that copies the specified text to the clipboard.
     *
     * @see https://core.telegram.org/bots/api#callbackquery callback query
     * @see https://core.telegram.org/bots/api#webappinfo WebAppInfo
     * @see https://core.telegram.org/bots/webapps Web App
     * @see https://core.telegram.org/bots/api#answerwebappquery answerWebAppQuery
     * @see https://core.telegram.org/bots/api#loginurl LoginUrl
     * @see https://core.telegram.org/widgets/login Telegram Login Widget
     * @see https://core.telegram.org/bots/api#switchinlinequerychosenchat SwitchInlineQueryChosenChat
     * @see https://core.telegram.org/bots/api#copytextbutton CopyTextButton
     * @see https://core.telegram.org/bots/api#callbackgame CallbackGame
     * @see https://core.telegram.org/bots/api#payments Pay button
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
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return InlineKeyboardButton
     */
    public function setText(string $text): InlineKeyboardButton
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return CallbackData|null
     */
    public function getCallbackData(): CallbackData|null
    {
        return $this->callback_data;
    }

    /**
     * @param CallbackData|null $callback_data
     *
     * @return InlineKeyboardButton
     */
    public function setCallbackData(CallbackData|null $callback_data): InlineKeyboardButton
    {
        $this->callback_data = $callback_data;
        return $this;
    }

    /**
     * @return CallbackGame|null
     */
    public function getCallbackGame(): CallbackGame|null
    {
        return $this->callback_game;
    }

    /**
     * @param CallbackGame|null $callback_game
     *
     * @return InlineKeyboardButton
     */
    public function setCallbackGame(CallbackGame|null $callback_game): InlineKeyboardButton
    {
        $this->callback_game = $callback_game;
        return $this;
    }

    /**
     * @return LoginUrl|null
     */
    public function getLoginUrl(): LoginUrl|null
    {
        return $this->login_url;
    }

    /**
     * @param LoginUrl|null $login_url
     *
     * @return InlineKeyboardButton
     */
    public function setLoginUrl(LoginUrl|null $login_url): InlineKeyboardButton
    {
        $this->login_url = $login_url;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPay(): bool|null
    {
        return $this->pay;
    }

    /**
     * @param bool|null $pay
     *
     * @return InlineKeyboardButton
     */
    public function setPay(bool|null $pay): InlineKeyboardButton
    {
        $this->pay = $pay;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQuery(): string|null
    {
        return $this->switch_inline_query;
    }

    /**
     * @param string|null $switch_inline_query
     *
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQuery(string|null $switch_inline_query): InlineKeyboardButton
    {
        $this->switch_inline_query = $switch_inline_query;
        return $this;
    }

    /**
     * @return SwitchInlineQueryChosenChat|null
     */
    public function getSwitchInlineQueryChosenChat(): SwitchInlineQueryChosenChat|null
    {
        return $this->switch_inline_query_chosen_chat;
    }

    /**
     * @param SwitchInlineQueryChosenChat|null $switch_inline_query_chosen_chat
     *
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQueryChosenChat(SwitchInlineQueryChosenChat|null $switch_inline_query_chosen_chat): InlineKeyboardButton
    {
        $this->switch_inline_query_chosen_chat = $switch_inline_query_chosen_chat;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQueryCurrentChat(): string|null
    {
        return $this->switch_inline_query_current_chat;
    }

    /**
     * @param string|null $switch_inline_query_current_chat
     *
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQueryCurrentChat(string|null $switch_inline_query_current_chat): InlineKeyboardButton
    {
        $this->switch_inline_query_current_chat = $switch_inline_query_current_chat;
        return $this;
    }

    /**
     * @return Url|null
     */
    public function getUrl(): Url|null
    {
        return $this->url;
    }

    /**
     * @param Url|null $url
     *
     * @return InlineKeyboardButton
     */
    public function setUrl(Url|null $url): InlineKeyboardButton
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return WebAppInfo|null
     */
    public function getWebApp(): WebAppInfo|null
    {
        return $this->web_app;
    }

    /**
     * @param WebAppInfo|null $web_app
     *
     * @return InlineKeyboardButton
     */
    public function setWebApp(WebAppInfo|null $web_app): InlineKeyboardButton
    {
        $this->web_app = $web_app;
        return $this;
    }

    /**
     * @return CopyTextButton|null
     */
    public function getCopyText(): CopyTextButton|null
    {
        return $this->copy_text;
    }

    /**
     * @param CopyTextButton|null $copy_text
     *
     * @return InlineKeyboardButton
     */
    public function setCopyText(CopyTextButton|null $copy_text): InlineKeyboardButton
    {
        $this->copy_text = $copy_text;
        return $this;
    }
}
