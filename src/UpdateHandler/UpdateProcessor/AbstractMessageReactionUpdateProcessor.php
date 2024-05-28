<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\MessageReactionUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process message reaction
 */
abstract class AbstractMessageReactionUpdateProcessor extends AbstractUpdateProcessor
{
    protected MessageReactionUpdated $messageReaction;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getMessageReaction()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::MessageReaction);
        }
        $this->messageReaction = $update->getMessageReaction();
        return $this;
    }
}
