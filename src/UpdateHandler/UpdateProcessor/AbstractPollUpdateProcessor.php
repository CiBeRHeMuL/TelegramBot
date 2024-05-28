<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\Poll;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process poll
 */
abstract class AbstractPollUpdateProcessor extends AbstractUpdateProcessor
{
    protected Poll $poll;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getPoll()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::Poll);
        }
        $this->poll = $update->getPoll();
        return $this;
    }
}
