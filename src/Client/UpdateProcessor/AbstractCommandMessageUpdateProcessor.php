<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;
use Psr\Log\LoggerInterface;

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

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        $commandEnd = str_contains($update->getMessage()->getText(), ' ')
            ? strpos($update->getMessage()->getText(), ' ')
            : strlen($update->getMessage()->getText()) - 1;
        $this->command = substr($update->getMessage()->getText(), 0, $commandEnd);
        $this->textWithoutCommand = substr($update->getMessage()->getText(), $commandEnd + 1);
    }
}
