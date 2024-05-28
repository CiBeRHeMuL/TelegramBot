<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\BusinessMessagesDeleted;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process deleted business messages
 */
abstract class AbstractDeletedBusinessMessagesUpdateProcessor extends AbstractUpdateProcessor
{
    protected BusinessMessagesDeleted $deletedBusinessMessages;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getDeletedBusinessMessages()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::DeletedBusinessMessages);
        }
        $this->deletedBusinessMessages = $update->getDeletedBusinessMessages();
        return $this;
    }
}
