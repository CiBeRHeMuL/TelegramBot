<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_BotDescription
/**
 * This object represents the bot's description.
 *
 * @see https://core.telegram.org/bots/api#botdescription
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
// endregion CLASS_BotDescription
