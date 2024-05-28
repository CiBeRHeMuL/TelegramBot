<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\BusinessConnection;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process business connection
 */
abstract class AbstractBusinessConnectionUpdateProcessor extends AbstractUpdateProcessor
{
    protected BusinessConnection $businessConnection;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getBusinessConnection()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::BusinessConnection);
        }
        $this->businessConnection = $update->getBusinessConnection();
        return $this;
    }
}
