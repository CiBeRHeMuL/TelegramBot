<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\PreCheckoutQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process pre checkout query
 */
abstract class AbstractPreCheckoutQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected PreCheckoutQuery $pre_checkout_query;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getPreCheckoutQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::PreCheckoutQuery);
        }
        $this->pre_checkout_query = $update->getPreCheckoutQuery();
    }
}
