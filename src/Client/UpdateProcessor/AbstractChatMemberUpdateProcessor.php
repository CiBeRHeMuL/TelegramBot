<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ChatMemberUpdated;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process chat member
 */
abstract class AbstractChatMemberUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatMemberUpdated $chat_member;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getChatMember()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChatMember);
        }
        $this->chat_member = $update->getChatMember();
    }
}
