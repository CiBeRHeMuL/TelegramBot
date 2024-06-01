<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process message
 */
abstract class AbstractMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $message;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::Message);
        }
        $this->message = $update->getMessage();
    }
}
