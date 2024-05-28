<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ChatBoostRemoved;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process removed chat boost
 */
abstract class AbstractRemovedChatBoostUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatBoostRemoved $removed_chat_boost;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getRemovedChatBoost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::RemovedChatBoost);
        }
        $this->removed_chat_boost = $update->getRemovedChatBoost();
    }
}
