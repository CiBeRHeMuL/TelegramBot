<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents the bot's name.
 *
 * @link https://core.telegram.org/bots/api#botname
 */
final class BotName implements EntityInterface
{
    /**
     * @param string $name The bot's name
     */
    public function __construct(
        protected string $name,
    ) {
    }

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

    public function toArray(): array|stdClass
    {
        return [
            'name' => $this->name,
        ];
    }
}
