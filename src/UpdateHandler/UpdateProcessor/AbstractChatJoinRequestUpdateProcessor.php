<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\ChatJoinRequest;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process chat join request
 */
abstract class AbstractChatJoinRequestUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatJoinRequest $chatJoinRequest;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getChatJoinRequest()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChatJoinRequest);
        }
        $this->chatJoinRequest = $update->getChatJoinRequest();
        return $this;
    }
}
