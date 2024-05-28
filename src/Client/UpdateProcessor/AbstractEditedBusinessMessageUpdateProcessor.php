<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process edited business message
 */
abstract class AbstractEditedBusinessMessageUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $edited_business_message;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getEditedBusinessMessage()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::EditedBusinessMessage);
        }
        $this->edited_business_message = $update->getEditedBusinessMessage();
    }
}
