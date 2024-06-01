<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ShippingQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process shipping query
 */
abstract class AbstractShippingQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected ShippingQuery $shippingQuery;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getShippingQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ShippingQuery);
        }
        $this->shippingQuery = $update->getShippingQuery();
    }
}
