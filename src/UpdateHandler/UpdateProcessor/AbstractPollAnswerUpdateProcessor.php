<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\PollAnswer;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process poll answer
 */
abstract class AbstractPollAnswerUpdateProcessor extends AbstractUpdateProcessor
{
    protected PollAnswer $pollAnswer;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getPollAnswer()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::PollAnswer);
        }
        $this->pollAnswer = $update->getPollAnswer();
    }
}
