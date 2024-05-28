<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\ChosenInlineResult;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process chosen inline result
 */
abstract class AbstractChosenInlineResultUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChosenInlineResult $chosenInlineResult;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getChosenInlineResult()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChosenInlineResult);
        }
        $this->chosenInlineResult = $update->getChosenInlineResult();
        return $this;
    }
}
