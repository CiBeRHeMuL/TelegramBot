<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\CallbackQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process callback query
 */
abstract class AbstractCallbackQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected CallbackQuery $callbackQuery;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getCallbackQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::CallbackQuery);
        }
        $this->callbackQuery = $update->getCallbackQuery();
        return $this;
    }
}
