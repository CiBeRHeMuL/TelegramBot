<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process edited channel post
 */
abstract class AbstractEditedChannelPostUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $editedChannelPost;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getEditedChannelPost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::EditedChannelPost);
        }
        $this->editedChannelPost = $update->getEditedChannelPost();
        return $this;
    }
}
