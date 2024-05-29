<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\MessageReactionUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process message reaction
 */
abstract class AbstractMessageReactionUpdateProcessor extends AbstractUpdateProcessor
{
    protected MessageReactionUpdated $messageReaction;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getMessageReaction()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::MessageReaction);
        }
        $this->messageReaction = $update->getMessageReaction();
    }
}
