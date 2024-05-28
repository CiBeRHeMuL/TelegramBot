<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\PollAnswer;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process poll answer
 */
abstract class AbstractPollAnswerUpdateProcessor extends AbstractUpdateProcessor
{
    protected PollAnswer $poll_answer;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getPollAnswer()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::PollAnswer);
        }
        $this->poll_answer = $update->getPollAnswer();
    }
}
