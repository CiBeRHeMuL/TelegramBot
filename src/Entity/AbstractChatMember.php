<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;

/**
 * This object contains information about one member of a chat.
 * @link https://core.telegram.org/bots/api#chatmember
 */
#[AvailableInheritors([
    ChatMemberAdministrator::class,
    ChatMemberOwner::class,
    ChatMemberMember::class,
    ChatMemberRestricted::class,
    ChatMemberBanned::class,
    ChatMemberLeft::class,
])]
abstract class AbstractChatMember extends AbstractEntity
{
    public function __construct(
        protected readonly ChatMemberStatusEnum $status,
    ) {
        parent::__construct();
    }

    public function getStatus(): ChatMemberStatusEnum
    {
        return $this->status;
    }
}
