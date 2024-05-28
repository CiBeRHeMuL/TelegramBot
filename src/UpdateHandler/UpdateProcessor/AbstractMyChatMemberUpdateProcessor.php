<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\ChatMemberUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process my chat member
 */
abstract class AbstractMyChatMemberUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatMemberUpdated $myChatMember;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getMyChatMember()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::MyChatMember);
        }
        $this->myChatMember = $update->getMyChatMember();
        return $this;
    }
}
