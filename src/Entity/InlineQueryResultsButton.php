<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a button to be shown above inline query results. You must use exactly one of the optional fields.
 *
 * @link https://core.telegram.org/bots/api#inlinequeryresultsbutton
 */
class InlineQueryResultsButton extends AbstractEntity
{
    /**
     * @param string $text Label text on the button
     * @param string|null $start_parameter Optional. Deep-linking parameter for the /start message sent to the bot when a user presses
     * the button. 1-64 characters, only A-Z, a-z, 0-9, _ and - are allowed.Example: An inline bot that sends YouTube videos can
     * ask the user to connect the bot to their YouTube account to adapt search results accordingly. To do this, it displays a 'Connect
     * your YouTube account' button above the results, or even before showing any. The user presses the button, switches to a private
     * chat with the bot and, in doing so, passes a start parameter that instructs the bot to return an OAuth link. Once done, the
     * bot can offer a switch_inline button so that the user can easily return to the chat where they wanted to use the bot's inline
     * capabilities.
     * @param WebAppInfo|null $web_app Optional. Description of the Web App that will be launched when the user presses the button.
     * The Web App will be able to switch back to the inline mode using the method switchInlineQuery inside the Web App.
     *
     * @see https://core.telegram.org/bots/api#webappinfo WebAppInfo
     * @see https://core.telegram.org/bots/webapps Web App
     * @see https://core.telegram.org/bots/webapps#initializing-mini-apps switchInlineQuery
     * @see https://core.telegram.org/bots/features#deep-linking Deep-linking
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup switch_inline
     */
    public function __construct(
        protected string $text,
        protected string|null $start_parameter = null,
        protected WebAppInfo|null $web_app = null,
    ) {
        parent::__construct();
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
     * @return InlineQueryResultsButton
     */
    public function setText(string $text): InlineQueryResultsButton
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStartParameter(): string|null
    {
        return $this->start_parameter;
    }

    /**
     * @param string|null $start_parameter
     *
     * @return InlineQueryResultsButton
     */
    public function setStartParameter(string|null $start_parameter): InlineQueryResultsButton
    {
        $this->start_parameter = $start_parameter;
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
     * @return InlineQueryResultsButton
     */
    public function setWebApp(WebAppInfo|null $web_app): InlineQueryResultsButton
    {
        $this->web_app = $web_app;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'text' => $this->text,
            'start_parameter' => $this->start_parameter,
            'web_app' => $this->web_app?->toArray(),
        ];
    }
}
