<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ChatBoostRemoved;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process removed chat boost
 */
abstract class AbstractRemovedChatBoostUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatBoostRemoved $removedChatBoost;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getRemovedChatBoost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::RemovedChatBoost);
        }
        $this->removedChatBoost = $update->getRemovedChatBoost();
    }
}
