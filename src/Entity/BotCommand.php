<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a bot command.
 * @link https://core.telegram.org/bots/api#botcommand
 */
class BotCommand extends AbstractEntity
{
    /**
     * @param string $command Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     * @param string $description Description of the command; 1-256 characters.
     */
    public function __construct(
        protected string $command,
        protected string $description,
    ) {
        parent::__construct();
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function setCommand(string $command): BotCommand
    {
        $this->command = $command;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): BotCommand
    {
        $this->description = $description;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'command' => $this->command,
            'description' => $this->description,
        ];
    }
}
