<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\ChatBoostRemoved;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process removed chat boost
 */
abstract class AbstractRemovedChatBoostUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatBoostRemoved $removedChatBoost;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getRemovedChatBoost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::RemovedChatBoost);
        }
        $this->removedChatBoost = $update->getRemovedChatBoost();
        return $this;
    }
}
