<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\CallbackQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process callback query
 */
abstract class AbstractCallbackQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected CallbackQuery $callbackQuery;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getCallbackQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::CallbackQuery);
        }
        $this->callbackQuery = $update->getCallbackQuery();
    }
}
