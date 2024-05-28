<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process business message
 */
abstract class AbstractBusinessMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $businessMessage;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getBusinessMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::BusinessMessage);
        }
        $this->businessMessage = $update->getBusinessMessage();
    }
}
