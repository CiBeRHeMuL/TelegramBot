<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents the bot's description.
 *
 * @link https://core.telegram.org/bots/api#botdescription
 */
final class BotDescription implements EntityInterface
{
    /**
     * @param string $description The bot's description
     */
    public function __construct(
        protected string $description,
    ) {}

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return BotDescription
     */
    public function setDescription(string $description): BotDescription
    {
        $this->description = $description;
        return $this;
    }
}
