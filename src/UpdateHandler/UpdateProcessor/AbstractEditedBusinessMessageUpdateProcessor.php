<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process edited business message
 */
abstract class AbstractEditedBusinessMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $editedBusinessMessage;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getEditedBusinessMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::EditedBusinessMessage);
        }
        $this->editedBusinessMessage = $update->getEditedBusinessMessage();
    }
}
