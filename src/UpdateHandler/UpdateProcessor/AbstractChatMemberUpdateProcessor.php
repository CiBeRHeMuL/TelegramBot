<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\ChatMemberUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process chat member
 */
abstract class AbstractChatMemberUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatMemberUpdated $chatMember;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getChatMember()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChatMember);
        }
        $this->chatMember = $update->getChatMember();
        return $this;
    }
}
