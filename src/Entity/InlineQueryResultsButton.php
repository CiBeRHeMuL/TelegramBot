<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a button to be shown above inline query results. You must use exactly one of the optional fields.
 * @link https://core.telegram.org/bots/api#inlinequeryresultsbutton
 */
class InlineQueryResultsButton implements EntityInterface
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
     */
    public function __construct(
        private string $text,
        private string|null $start_parameter = null,
        private WebAppInfo|null $web_app = null,
    ) {
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): InlineQueryResultsButton
    {
        $this->text = $text;
        return $this;
    }

    public function getStartParameter(): string|null
    {
        return $this->start_parameter;
    }

    public function setStartParameter(string|null $start_parameter): InlineQueryResultsButton
    {
        $this->start_parameter = $start_parameter;
        return $this;
    }

    public function getWebApp(): WebAppInfo|null
    {
        return $this->web_app;
    }

    public function setWebApp(WebAppInfo|null $web_app): InlineQueryResultsButton
    {
        $this->web_app = $web_app;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'text' => $this->text,
            'start_parameter' => $this->start_parameter,
            'web_app' => $this->web_app?->toArray(),
        ];
    }
}
