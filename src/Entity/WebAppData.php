<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes data sent from a Web App to the bot.
 * @link https://core.telegram.org/bots/api#webappdata
 * @link https://core.telegram.org/bots/webapps
 */
class WebAppData extends AbstractEntity
{
    /**
     * @param string $data The data. Be aware that a bad client can send arbitrary data in this field.
     * @param string $button_text Text of the web_app keyboard button from which the Web App was opened.
     * Be aware that a bad client can send arbitrary data in this field.
     */
    public function __construct(
        protected string $data,
        protected string $button_text,
    ) {
        parent::__construct();
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): WebAppData
    {
        $this->data = $data;
        return $this;
    }

    public function getButtonText(): string
    {
        return $this->button_text;
    }

    public function setButtonText(string $button_text): WebAppData
    {
        $this->button_text = $button_text;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'data' => $this->data,
            'button_text' => $this->button_text,
        ];
    }
}
