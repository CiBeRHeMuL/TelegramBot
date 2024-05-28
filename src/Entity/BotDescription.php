<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents the bot's description.
 * @link https://core.telegram.org/bots/api#botdescription
 */
class BotDescription extends AbstractEntity
{
    /**
     * @param string $description The bot's description
     */
    public function __construct(
        protected string $description,
    ) {
        parent::__construct();
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): BotDescription
    {
        $this->description = $description;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'description' => $this->description,
        ];
    }
}
