<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains data sent from a Web App to the bot.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#webappdata
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: WebAppData, Telegram, Bot API, DTO, webappdata
// STRUCTURE: ▶ ┌data,button_text┐ → ∑ WebAppData
// region CLASS_WebAppData

/**
 * Describes data sent from a Web App to the bot.
 *
 * @see https://core.telegram.org/bots/webapps Web App
 * @see https://core.telegram.org/bots/api#webappdata
 */
final class WebAppData implements EntityInterface
{
    /**
     * @param string $data        The data. Be aware that a bad client can send arbitrary data in this field.
     * @param string $button_text Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client
     *                            can send arbitrary data in this field.
     */
    public function __construct(
        protected string $data,
        protected string $button_text,
    ) {}

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     *
     * @return WebAppData
     */
    public function setData(string $data): WebAppData
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getButtonText(): string
    {
        return $this->button_text;
    }

    /**
     * @param string $button_text
     *
     * @return WebAppData
     */
    public function setButtonText(string $button_text): WebAppData
    {
        $this->button_text = $button_text;

        return $this;
    }
}

// endregion CLASS_WebAppData
