<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\Update;

/**
 * Process command message (ex. /start)
 */
abstract class AbstractCommandMessageUpdateProcessor extends AbstractMessageUpdateProcessor
{
    /**
     * @var string $command message command without preceding '/' (ex start)
     */
    protected string $command;
    /**
     * @var string $textWithoutCommand message text without command
     */
    protected string $textWithoutCommand;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        $commandEnd = str_contains($update->getMessage()->getText(), ' ')
            ? strpos($update->getMessage()->getText(), ' ')
            : strlen($update->getMessage()->getText());
        $this->command = substr($update->getMessage()->getText(), 1, $commandEnd);
        $this->textWithoutCommand = substr($update->getMessage()->getText(), $commandEnd + 1);
        return $this;
    }
}
