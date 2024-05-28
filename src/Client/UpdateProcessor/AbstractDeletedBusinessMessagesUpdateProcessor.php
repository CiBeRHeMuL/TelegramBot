<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\BusinessMessagesDeleted;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process deleted business messages
 */
abstract class AbstractDeletedBusinessMessagesUpdateProcessor extends AbstractUpdateProcessor
{
    protected BusinessMessagesDeleted $deleted_business_messages;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getDeletedBusinessMessages()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::DeletedBusinessMessages);
        }
        $this->deleted_business_messages = $update->getDeletedBusinessMessages();
    }
}
