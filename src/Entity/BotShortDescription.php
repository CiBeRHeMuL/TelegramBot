<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_BotShortDescription
/**
 * This object represents the bot's short description.
 *
 * @see https://core.telegram.org/bots/api#botshortdescription
 */
final class BotShortDescription implements EntityInterface
{
    /**
     * @param string $short_description The bot's short description
     */
    public function __construct(
        protected string $short_description,
    ) {}

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->short_description;
    }

    /**
     * @param string $short_description
     *
     * @return BotShortDescription
     */
    public function setShortDescription(string $short_description): BotShortDescription
    {
        $this->short_description = $short_description;

        return $this;
    }
}
// endregion CLASS_BotShortDescription
