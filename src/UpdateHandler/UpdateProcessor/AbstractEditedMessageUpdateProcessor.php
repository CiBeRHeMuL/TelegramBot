<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process edited message
 */
abstract class AbstractEditedMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $editedMessage;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getEditedMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::EditedMessage);
        }
        $this->editedMessage = $update->getEditedMessage();
        return $this;
    }
}
