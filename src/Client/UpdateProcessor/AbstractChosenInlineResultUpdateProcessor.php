<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ChosenInlineResult;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process chosen inline result
 */
abstract class AbstractChosenInlineResultUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChosenInlineResult $chosenInlineResult;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getChosenInlineResult()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChosenInlineResult);
        }
        $this->chosenInlineResult = $update->getChosenInlineResult();
    }
}
