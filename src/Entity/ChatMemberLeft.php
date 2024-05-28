<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;
use stdClass;

/**
 * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
 * @link https://core.telegram.org/bots/api#chatmemberleft
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Left->value))]
class ChatMemberLeft extends AbstractChatMember
{
    /**
     * @param User $user Information about the user
     */
    public function __construct(
        private User $user,
    ) {
        parent::__construct(ChatMemberStatusEnum::Left);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): ChatMemberLeft
    {
        $this->user = $user;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'status' => $this->status,
            'user' => $this->user->toArray(),
        ];
    }
}
