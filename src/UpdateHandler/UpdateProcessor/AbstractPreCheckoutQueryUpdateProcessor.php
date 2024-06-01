<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\PreCheckoutQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process pre checkout query
 */
abstract class AbstractPreCheckoutQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected PreCheckoutQuery $preCheckoutQuery;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getPreCheckoutQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::PreCheckoutQuery);
        }
        $this->preCheckoutQuery = $update->getPreCheckoutQuery();
    }
}
