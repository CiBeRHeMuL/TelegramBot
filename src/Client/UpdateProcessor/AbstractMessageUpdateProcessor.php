<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process message
 */
abstract class AbstractMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $message;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::Message);
        }
        $this->message = $update->getMessage();
    }
}
