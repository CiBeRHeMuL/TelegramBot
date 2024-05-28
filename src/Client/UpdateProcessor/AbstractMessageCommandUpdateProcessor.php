<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;

/**
 * Process command message (ex. /start)
 */
abstract class AbstractMessageCommandUpdateProcessor extends AbstractMessageUpdateProcessor
{
    /**
     * @var string $command message command without preceding '/' (ex start)
     */
    protected string $command;
    /**
     * @var string $textWithoutCommand message text without command
     */
    protected string $textWithoutCommand;
    /**
     * @var string $text full message text
     */
    protected string $text;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        $commandEnd = mb_strpos($update->getMessage()->getText(), ' ');
        $this->command = mb_substr($update->getMessage()->getText(), 0, $commandEnd);
        $this->textWithoutCommand = mb_substr($update->getMessage()->getText(), $commandEnd + 1);
        $this->text = $update->getMessage()->getText();
    }
}
