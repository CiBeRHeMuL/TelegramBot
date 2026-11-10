<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\RichMessageButtonStyleEnum;
use AndrewGos\TelegramBot\ValueObject\CallbackData;
use AndrewGos\TelegramBot\ValueObject\Url;

// region CLASS_RichMessageButton
/**
 * This object represents a button in a RichMessage. Exactly one of the fields other than text and style must be used to specify the type of the button.
 *
 * @see https://core.telegram.org/bots/api#richmessagebutton
 */
final class RichMessageButton implements EntityInterface
{
    /**
     * @param AbstractRichText|string|array    $text                             Text of the button. May contain only plain text, RichTextCustomEmoji and RichTextDateTime
     * @param RichMessageButtonStyleEnum|null  $style                            Optional. Style of the button. Must be one of "danger" (red), "success" (green), "primary" (blue) or "link" (the button is shown as a regular link without borders). If omitted, then an app-specific style is used. The style "link" is allowed only for callback buttons
     * @param Url|null                         $url                              Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used to mention a user by their identifier without using a username, if this is allowed by their privacy settings
     * @param CallbackData|null                $callback_data                    Optional. Data to be sent in a callback query to the bot when the button is pressed, 1-64 bytes
     * @param WebAppInfo|null                  $web_app                          Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery
     * @param LoginUrl|null                    $login_url                        Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget
     * @param string|null                      $switch_inline_query              Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which case just the bot's username will be inserted
     * @param string|null                      $switch_inline_query_current_chat Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will be inserted
     * @param SwitchInlineQueryChosenChat|null $switch_inline_query_chosen_chat  Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field
     * @param CopyTextButton|null              $copy_text                        Optional. A button that copies the specified text to the clipboard
     * @param DisabledButton|null              $disabled                         Optional. If set, then the button is disabled and does nothing
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     * @see https://core.telegram.org/bots/api#webappinfo WebAppInfo
     * @see https://core.telegram.org/bots/api#answerwebappquery answerWebAppQuery
     * @see https://core.telegram.org/bots/api#loginurl LoginUrl
     * @see https://core.telegram.org/widgets/login Telegram Login Widget
     * @see https://core.telegram.org/bots/api#switchinlinequerychosenchat SwitchInlineQueryChosenChat
     * @see https://core.telegram.org/bots/api#copytextbutton CopyTextButton
     * @see https://core.telegram.org/bots/api#disabledbutton DisabledButton
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected ?RichMessageButtonStyleEnum $style = null,
        protected ?Url $url = null,
        protected ?CallbackData $callback_data = null,
        protected ?WebAppInfo $web_app = null,
        protected ?LoginUrl $login_url = null,
        protected ?string $switch_inline_query = null,
        protected ?string $switch_inline_query_current_chat = null,
        protected ?SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat = null,
        protected ?CopyTextButton $copy_text = null,
        protected ?DisabledButton $disabled = null,
    ) {}

    /**
     * @return AbstractRichText|string|array
     */
    public function getText(): AbstractRichText|string|array
    {
        return $this->text;
    }

    /**
     * @param AbstractRichText|string|array $text
     *
     * @return RichMessageButton
     */
    public function setText(AbstractRichText|string|array $text): RichMessageButton
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return RichMessageButtonStyleEnum|null
     */
    public function getStyle(): ?RichMessageButtonStyleEnum
    {
        return $this->style;
    }

    /**
     * @param RichMessageButtonStyleEnum|null $style
     *
     * @return RichMessageButton
     */
    public function setStyle(?RichMessageButtonStyleEnum $style): RichMessageButton
    {
        $this->style = $style;

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
     * @return RichMessageButton
     */
    public function setUrl(?Url $url): RichMessageButton
    {
        $this->url = $url;

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
     * @return RichMessageButton
     */
    public function setCallbackData(?CallbackData $callback_data): RichMessageButton
    {
        $this->callback_data = $callback_data;

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
     * @return RichMessageButton
     */
    public function setWebApp(?WebAppInfo $web_app): RichMessageButton
    {
        $this->web_app = $web_app;

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
     * @return RichMessageButton
     */
    public function setLoginUrl(?LoginUrl $login_url): RichMessageButton
    {
        $this->login_url = $login_url;

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
     * @return RichMessageButton
     */
    public function setSwitchInlineQuery(?string $switch_inline_query): RichMessageButton
    {
        $this->switch_inline_query = $switch_inline_query;

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
     * @return RichMessageButton
     */
    public function setSwitchInlineQueryCurrentChat(?string $switch_inline_query_current_chat): RichMessageButton
    {
        $this->switch_inline_query_current_chat = $switch_inline_query_current_chat;

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
     * @return RichMessageButton
     */
    public function setSwitchInlineQueryChosenChat(?SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat): RichMessageButton
    {
        $this->switch_inline_query_chosen_chat = $switch_inline_query_chosen_chat;

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
     * @return RichMessageButton
     */
    public function setCopyText(?CopyTextButton $copy_text): RichMessageButton
    {
        $this->copy_text = $copy_text;

        return $this;
    }

    /**
     * @return DisabledButton|null
     */
    public function getDisabled(): ?DisabledButton
    {
        return $this->disabled;
    }

    /**
     * @param DisabledButton|null $disabled
     *
     * @return RichMessageButton
     */
    public function setDisabled(?DisabledButton $disabled): RichMessageButton
    {
        $this->disabled = $disabled;

        return $this;
    }
}

// endregion CLASS_RichMessageButton
