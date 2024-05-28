<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\PollAnswer;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process poll answer
 */
abstract class AbstractPollAnswerUpdateProcessor extends AbstractUpdateProcessor
{
    protected PollAnswer $pollAnswer;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getPollAnswer()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::PollAnswer);
        }
        $this->pollAnswer = $update->getPollAnswer();
        return $this;
    }
}
