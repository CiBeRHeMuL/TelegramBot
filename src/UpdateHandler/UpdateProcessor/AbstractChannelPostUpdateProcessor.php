<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process channel post
 */
abstract class AbstractChannelPostUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $channelPost;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getChannelPost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChannelPost);
        }
        $this->channelPost = $update->getChannelPost();
        return $this;
    }
}
