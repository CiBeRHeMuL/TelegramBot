<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object contains information about one member of a chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chatmember
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Administrator chat member] => ChatMemberAdministrator
 * CLASS 5[Owner chat member] => ChatMemberOwner
 * CLASS 5[Regular member] => ChatMemberMember
 * CLASS 5[Restricted member] => ChatMemberRestricted
 * CLASS 5[Banned member] => ChatMemberBanned
 * CLASS 5[Left member] => ChatMemberLeft
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractChatMember, Telegram Bot API, abstract, chat, member, DTO
// STRUCTURE: ▶ ┌status: ChatMemberStatusEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractChatMember [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
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
