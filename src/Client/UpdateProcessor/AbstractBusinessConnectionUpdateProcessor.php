<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\BusinessConnection;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process business connection
 */
abstract class AbstractBusinessConnectionUpdateProcessor extends AbstractUpdateProcessor
{
    protected BusinessConnection $business_connection;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getBusinessConnection()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::BusinessConnection);
        }
        $this->business_connection = $update->getBusinessConnection();
    }
}
