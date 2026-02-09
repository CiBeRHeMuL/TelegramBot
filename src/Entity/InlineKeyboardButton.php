<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\KeyboardButtonStyleEnum;
use AndrewGos\TelegramBot\ValueObject\CallbackData;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * This object represents one button of an inline keyboard. Exactly one of the fields other than text, icon_custom_emoji_id,
 * and style must be used to specify the type of the button.
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
     * @param string|null $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown before the text of the button.
     * Can only be used by bots that purchased additional usernames on Fragment or in the messages directly sent by the bot to private,
     * group and supergroup chats if the owner of the bot has a Telegram Premium subscription.
     * @param KeyboardButtonStyleEnum|null $style Optional. Style of the button. Must be one of “danger” (red), “success” (green) or “primary”
     * (blue). If omitted, then an app-specific style is used.
     *
     * @see https://fragment.com Fragment
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
        protected ?CallbackData $callback_data = null,
        protected ?CallbackGame $callback_game = null,
        protected ?LoginUrl $login_url = null,
        protected ?bool $pay = null,
        protected ?string $switch_inline_query = null,
        protected ?SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat = null,
        protected ?string $switch_inline_query_current_chat = null,
        protected ?Url $url = null,
        protected ?WebAppInfo $web_app = null,
        protected ?CopyTextButton $copy_text = null,
        protected ?string $icon_custom_emoji_id = null,
        protected ?KeyboardButtonStyleEnum $style = null,
    ) {}

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
    public function getCallbackData(): ?CallbackData
    {
        return $this->callback_data;
    }

    /**
     * @param CallbackData|null $callback_data
     *
     * @return InlineKeyboardButton
     */
    public function setCallbackData(?CallbackData $callback_data): InlineKeyboardButton
    {
        $this->callback_data = $callback_data;
        return $this;
    }

    /**
     * @return CallbackGame|null
     */
    public function getCallbackGame(): ?CallbackGame
    {
        return $this->callback_game;
    }

    /**
     * @param CallbackGame|null $callback_game
     *
     * @return InlineKeyboardButton
     */
    public function setCallbackGame(?CallbackGame $callback_game): InlineKeyboardButton
    {
        $this->callback_game = $callback_game;
        return $this;
    }

    /**
     * @return LoginUrl|null
     */
    public function getLoginUrl(): ?LoginUrl
    {
        return $this->login_url;
    }

    /**
     * @param LoginUrl|null $login_url
     *
     * @return InlineKeyboardButton
     */
    public function setLoginUrl(?LoginUrl $login_url): InlineKeyboardButton
    {
        $this->login_url = $login_url;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPay(): ?bool
    {
        return $this->pay;
    }

    /**
     * @param bool|null $pay
     *
     * @return InlineKeyboardButton
     */
    public function setPay(?bool $pay): InlineKeyboardButton
    {
        $this->pay = $pay;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQuery(): ?string
    {
        return $this->switch_inline_query;
    }

    /**
     * @param string|null $switch_inline_query
     *
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQuery(?string $switch_inline_query): InlineKeyboardButton
    {
        $this->switch_inline_query = $switch_inline_query;
        return $this;
    }

    /**
     * @return SwitchInlineQueryChosenChat|null
     */
    public function getSwitchInlineQueryChosenChat(): ?SwitchInlineQueryChosenChat
    {
        return $this->switch_inline_query_chosen_chat;
    }

    /**
     * @param SwitchInlineQueryChosenChat|null $switch_inline_query_chosen_chat
     *
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQueryChosenChat(?SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat): InlineKeyboardButton
    {
        $this->switch_inline_query_chosen_chat = $switch_inline_query_chosen_chat;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSwitchInlineQueryCurrentChat(): ?string
    {
        return $this->switch_inline_query_current_chat;
    }

    /**
     * @param string|null $switch_inline_query_current_chat
     *
     * @return InlineKeyboardButton
     */
    public function setSwitchInlineQueryCurrentChat(?string $switch_inline_query_current_chat): InlineKeyboardButton
    {
        $this->switch_inline_query_current_chat = $switch_inline_query_current_chat;
        return $this;
    }

    /**
     * @return Url|null
     */
    public function getUrl(): ?Url
    {
        return $this->url;
    }

    /**
     * @param Url|null $url
     *
     * @return InlineKeyboardButton
     */
    public function setUrl(?Url $url): InlineKeyboardButton
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return WebAppInfo|null
     */
    public function getWebApp(): ?WebAppInfo
    {
        return $this->web_app;
    }

    /**
     * @param WebAppInfo|null $web_app
     *
     * @return InlineKeyboardButton
     */
    public function setWebApp(?WebAppInfo $web_app): InlineKeyboardButton
    {
        $this->web_app = $web_app;
        return $this;
    }

    /**
     * @return CopyTextButton|null
     */
    public function getCopyText(): ?CopyTextButton
    {
        return $this->copy_text;
    }

    /**
     * @param CopyTextButton|null $copy_text
     *
     * @return InlineKeyboardButton
     */
    public function setCopyText(?CopyTextButton $copy_text): InlineKeyboardButton
    {
        $this->copy_text = $copy_text;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIconCustomEmojiId(): ?string
    {
        return $this->icon_custom_emoji_id;
    }

    /**
     * @param string|null $icon_custom_emoji_id
     *
     * @return InlineKeyboardButton
     */
    public function setIconCustomEmojiId(?string $icon_custom_emoji_id): InlineKeyboardButton
    {
        $this->icon_custom_emoji_id = $icon_custom_emoji_id;
        return $this;
    }

    /**
     * @return KeyboardButtonStyleEnum|null
     */
    public function getStyle(): ?KeyboardButtonStyleEnum
    {
        return $this->style;
    }

    /**
     * @param KeyboardButtonStyleEnum|null $style
     *
     * @return InlineKeyboardButton
     */
    public function setStyle(?KeyboardButtonStyleEnum $style): InlineKeyboardButton
    {
        $this->style = $style;
        return $this;
    }
}
