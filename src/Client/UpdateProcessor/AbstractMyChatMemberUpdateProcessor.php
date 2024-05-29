<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ChatMemberUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process my chat member
 */
abstract class AbstractMyChatMemberUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatMemberUpdated $myChatMember;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getMyChatMember()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::MyChatMember);
        }
        $this->myChatMember = $update->getMyChatMember();
    }
}
