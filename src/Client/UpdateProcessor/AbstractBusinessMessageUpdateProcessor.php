<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process business message
 */
abstract class AbstractBusinessMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $businessMessage;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getBusinessMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::BusinessMessage);
        }
        $this->businessMessage = $update->getBusinessMessage();
    }
}
