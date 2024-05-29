<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ChatBoostUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process chat boost
 */
abstract class AbstractChatBoostUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatBoostUpdated $chatBoost;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getChatBoost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChatBoost);
        }
        $this->chatBoost = $update->getChatBoost();
    }
}
