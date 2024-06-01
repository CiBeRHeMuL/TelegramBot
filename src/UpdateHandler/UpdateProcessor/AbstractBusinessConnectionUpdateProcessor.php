<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\BusinessConnection;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process business connection
 */
abstract class AbstractBusinessConnectionUpdateProcessor extends AbstractUpdateProcessor
{
    protected BusinessConnection $businessConnection;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getBusinessConnection()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::BusinessConnection);
        }
        $this->businessConnection = $update->getBusinessConnection();
    }
}
