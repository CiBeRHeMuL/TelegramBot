<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\InlineQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process inline query
 */
abstract class AbstractInlineQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected InlineQuery $inlineQuery;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getInlineQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::InlineQuery);
        }
        $this->inlineQuery = $update->getInlineQuery();
        return $this;
    }
}
