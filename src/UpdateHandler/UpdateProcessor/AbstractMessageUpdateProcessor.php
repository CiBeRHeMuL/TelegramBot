<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process message
 */
abstract class AbstractMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $message;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::Message);
        }
        $this->message = $update->getMessage();
        return $this;
    }
}
