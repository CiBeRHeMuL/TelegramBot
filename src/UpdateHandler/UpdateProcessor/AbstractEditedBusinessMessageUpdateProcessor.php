<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process edited business message
 */
abstract class AbstractEditedBusinessMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $editedBusinessMessage;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getEditedBusinessMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::EditedBusinessMessage);
        }
        $this->editedBusinessMessage = $update->getEditedBusinessMessage();
        return $this;
    }
}
