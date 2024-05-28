<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ChatMemberUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process my chat member
 */
abstract class AbstractMyChatMemberUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatMemberUpdated $my_chat_member;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getMyChatMember()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::MyChatMember);
        }
        $this->my_chat_member = $update->getMyChatMember();
    }
}
