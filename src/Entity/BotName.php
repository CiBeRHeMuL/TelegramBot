<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_BotName
/**
 * This object represents the bot's name.
 *
 * @see https://core.telegram.org/bots/api#botname
 */
final class BotName implements EntityInterface
{
    /**
     * @param string $name The bot's name
     */
    public function __construct(
        protected string $name,
    ) {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return BotName
     */
    public function setName(string $name): BotName
    {
        $this->name = $name;

        return $this;
    }
}
// endregion CLASS_BotName
