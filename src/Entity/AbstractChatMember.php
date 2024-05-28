<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\AvailableExtensions;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;

/**
 * This object contains information about one member of a chat.
 * @link https://core.telegram.org/bots/api#chatmember
 */
#[AvailableExtensions([
    ChatMemberAdministrator::class,
    ChatMemberOwner::class,
    ChatMemberMember::class,
    ChatMemberRestricted::class,
    ChatMemberBanned::class,
    ChatMemberLeft::class,
])]
abstract class AbstractChatMember implements EntityInterface
{
    public function __construct(
        protected readonly ChatMemberStatusEnum $status
    ) {
    }

    public function getStatus(): ChatMemberStatusEnum
    {
        return $this->status;
    }
}
