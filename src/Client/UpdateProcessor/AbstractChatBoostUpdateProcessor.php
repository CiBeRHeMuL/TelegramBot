<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ChatBoostUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process chat boost
 */
abstract class AbstractChatBoostUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatBoostUpdated $chat_boost;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getChatBoost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChatBoost);
        }
        $this->chat_boost = $update->getChatBoost();
    }
}
