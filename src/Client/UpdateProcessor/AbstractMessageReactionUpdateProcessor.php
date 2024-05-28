<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\MessageReactionUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process message reaction
 */
abstract class AbstractMessageReactionUpdateProcessor extends AbstractUpdateProcessor
{
    protected MessageReactionUpdated $message_reaction;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getMessageReaction()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::MessageReaction);
        }
        $this->message_reaction = $update->getMessageReaction();
    }
}
