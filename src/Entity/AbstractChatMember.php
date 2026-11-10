<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;

// region CLASS_AbstractChatMember
/**
 * This object contains information about one member of a chat.
 *
 * @see https://core.telegram.org/bots/api#chatmember
 */
#[AvailableInheritors([
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
        protected readonly ChatMemberStatusEnum $status,
    ) {}

    public function getStatus(): ChatMemberStatusEnum
    {
        return $this->status;
    }
}
// endregion CLASS_AbstractChatMember
