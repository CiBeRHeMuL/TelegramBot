<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ChatMemberUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process chat member
 */
abstract class AbstractChatMemberUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatMemberUpdated $chatMember;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getChatMember()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChatMember);
        }
        $this->chatMember = $update->getChatMember();
    }
}
