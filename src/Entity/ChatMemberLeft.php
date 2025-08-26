<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;
use stdClass;

/**
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 *
 * @see https://core.telegram.org/bots/api#chatmember chat member
 * @link https://core.telegram.org/bots/api#chatmemberleft
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

    public function toArray(): array|stdClass
    {
        return [
            'user' => $this->user->toArray(),
            'status' => $this->status->value,
        ];
    }
}
