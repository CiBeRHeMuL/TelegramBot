<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_BotCommand
/**
 * This object represents a bot command.
 *
 * @see https://core.telegram.org/bots/api#botcommand
 */
final class BotCommand implements EntityInterface
{
    /**
     * @param string    $command      Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     * @param string    $description  description of the command; 1-256 characters
     * @param bool|null $is_ephemeral Optional. True, if the command must be shown only for the user mentioned in the receiver_user_id field of the send* methods
     */
    public function __construct(
        protected string $command,
        protected string $description,
        protected ?bool $is_ephemeral = null,
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

    /**
     * @return bool|null
     */
    public function getIsEphemeral(): ?bool
    {
        return $this->is_ephemeral;
    }

    /**
     * @param bool|null $is_ephemeral
     *
     * @return BotCommand
     */
    public function setIsEphemeral(?bool $is_ephemeral): BotCommand
    {
        $this->is_ephemeral = $is_ephemeral;

        return $this;
    }
}
// endregion CLASS_BotCommand
