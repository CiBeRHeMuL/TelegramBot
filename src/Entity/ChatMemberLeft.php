<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_member_left
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatMemberLeft, Telegram, Bot API, DTO, chat_member_left
// STRUCTURE: ▶ ┌user┐ → ∑ ChatMemberLeft
// region CLASS_ChatMemberLeft

/**
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 *
 * @see https://core.telegram.org/bots/api#chatmember chat member
 * @see https://core.telegram.org/bots/api#chatmemberleft
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Left->value))]
final class ChatMemberLeft extends AbstractChatMember
{
    /**
     * @param User $user Information about the user
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
    ) {
        parent::__construct(ChatMemberStatusEnum::Left);
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return ChatMemberLeft
     */
    public function setUser(User $user): ChatMemberLeft
    {
        $this->user = $user;

        return $this;
    }
}
// endregion CLASS_ChatMemberLeft
