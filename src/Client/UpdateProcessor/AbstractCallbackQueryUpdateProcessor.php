<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\CallbackQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process callback query
 */
abstract class AbstractCallbackQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected CallbackQuery $callback_query;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getCallbackQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::CallbackQuery);
        }
        $this->callback_query = $update->getCallbackQuery();
    }
}
