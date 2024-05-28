<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\InlineQuery;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process inline query
 */
abstract class AbstractInlineQueryUpdateProcessor extends AbstractUpdateProcessor
{
    protected InlineQuery $inline_query;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getInlineQuery()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::InlineQuery);
        }
        $this->inline_query = $update->getInlineQuery();
    }
}
