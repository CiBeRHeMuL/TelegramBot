<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents the bot's description.
 * @link https://core.telegram.org/bots/api#botdescription
 */
class BotDescription implements EntityInterface
{
    /**
     * @param string $description The bot's description
     */
    public function __construct(
        private string $description,
    ) {
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
