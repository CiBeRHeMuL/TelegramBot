<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\InlineQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process inline query
 */
abstract class AbstractInlineQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected InlineQuery $inlineQuery;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getInlineQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::InlineQuery);
        }
        $this->inlineQuery = $update->getInlineQuery();
    }
}
