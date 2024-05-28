<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\PreCheckoutQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process pre checkout query
 */
abstract class AbstractPreCheckoutQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected PreCheckoutQuery $preCheckoutQuery;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getPreCheckoutQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::PreCheckoutQuery);
        }
        $this->preCheckoutQuery = $update->getPreCheckoutQuery();
        return $this;
    }
}
