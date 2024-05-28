<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Poll;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process poll
 */
abstract class AbstractPollUpdateProcessor extends AbstractUpdateProcessor
{
    protected Poll $poll;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getPoll()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::Poll);
        }
        $this->poll = $update->getPoll();
    }
}
