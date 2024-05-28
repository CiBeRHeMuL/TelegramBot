<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ShippingQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process shipping query
 */
abstract class AbstractShippingQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected ShippingQuery $shipping_query;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getShippingQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ShippingQuery);
        }
        $this->shipping_query = $update->getShippingQuery();
    }
}
