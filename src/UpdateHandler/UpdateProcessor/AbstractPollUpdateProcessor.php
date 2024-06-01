<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Poll;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process poll
 */
abstract class AbstractPollUpdateProcessor extends AbstractUpdateProcessor
{
    protected Poll $poll;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getPoll()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::Poll);
        }
        $this->poll = $update->getPoll();
    }
}
