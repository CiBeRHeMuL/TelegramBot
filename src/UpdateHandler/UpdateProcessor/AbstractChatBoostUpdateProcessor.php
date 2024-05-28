<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\ChatBoostUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process chat boost
 */
abstract class AbstractChatBoostUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatBoostUpdated $chatBoost;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getChatBoost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChatBoost);
        }
        $this->chatBoost = $update->getChatBoost();
        return $this;
    }
}
