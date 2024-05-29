<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process edited message
 */
abstract class AbstractEditedMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $editedMessage;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getEditedMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::EditedMessage);
        }
        $this->editedMessage = $update->getEditedMessage();
    }
}
