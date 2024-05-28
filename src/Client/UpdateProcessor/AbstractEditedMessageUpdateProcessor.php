<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process edited message
 */
abstract class AbstractEditedMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $edited_message;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getEditedMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::EditedMessage);
        }
        $this->edited_message = $update->getEditedMessage();
    }
}
