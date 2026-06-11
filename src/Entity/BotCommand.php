<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents a bot command.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#bot_command
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotCommand, Telegram, Bot API, DTO, bot_command
// STRUCTURE: ▶ ┌command,description┐ → ∑ BotCommand
// region CLASS_BotCommand

/**
 * This object represents a bot command.
 *
 * @see https://core.telegram.org/bots/api#botcommand
 */
final class BotCommand implements EntityInterface
{
    /**
     * @param string $command     Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     * @param string $description description of the command; 1-256 characters
     */
    public function __construct(
        protected string $command,
        protected string $description,
    ) {}

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param string $command
     *
     * @return BotCommand
     */
    public function setCommand(string $command): BotCommand
    {
        $this->command = $command;

        return $this;
    }

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
     * @return BotCommand
     */
    public function setDescription(string $description): BotCommand
    {
        $this->description = $description;

        return $this;
    }
}
// endregion CLASS_BotCommand
