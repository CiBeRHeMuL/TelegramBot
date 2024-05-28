<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\MessageReactionCountUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process message reaction count
 */
abstract class AbstractMessageReactionCountUpdateProcessor extends AbstractUpdateProcessor
{
    protected MessageReactionCountUpdated $messageReactionCount;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getMessageReactionCount()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::MessageReactionCount);
        }
        $this->messageReactionCount = $update->getMessageReactionCount();
        return $this;
    }
}
