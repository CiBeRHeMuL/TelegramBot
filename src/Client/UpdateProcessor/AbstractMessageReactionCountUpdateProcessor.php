<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\MessageReactionCountUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process message reaction count
 */
abstract class AbstractMessageReactionCountUpdateProcessor extends AbstractUpdateProcessor
{
    protected MessageReactionCountUpdated $messageReactionCount;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getMessageReactionCount()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::MessageReactionCount);
        }
        $this->messageReactionCount = $update->getMessageReactionCount();
    }
}
