<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents the bot's short description.
 * @link https://core.telegram.org/bots/api#botshortdescription
 */
class BotShortDescription extends AbstractEntity
{
    /**
     * @param string $short_description The bot's short description
     */
    public function __construct(
        protected string $short_description,
    ) {
        parent::__construct();
    }

    public function getShortDescription(): string
    {
        return $this->short_description;
    }

    public function setShortDescription(string $short_description): BotShortDescription
    {
        $this->short_description = $short_description;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'short_description' => $this->short_description,
        ];
    }
}
