<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process business message
 */
abstract class AbstractBusinessMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $businessMessage;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getBusinessMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::BusinessMessage);
        }
        $this->businessMessage = $update->getBusinessMessage();
        return $this;
    }
}
