<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Entity\ShippingQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process shipping query
 */
abstract class AbstractShippingQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected ShippingQuery $shippingQuery;

    public function setUpdate(Update $update): static
    {
        parent::setUpdate($update);
        if (!$update->getShippingQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ShippingQuery);
        }
        $this->shippingQuery = $update->getShippingQuery();
        return $this;
    }
}
