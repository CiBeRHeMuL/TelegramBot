<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Builder\Attribute\BuildIf;
use AndrewGos\TelegramBot\Builder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;
use stdClass;

/**
 * Represents a chat member that has no additional privileges or restrictions.
 * @link https://core.telegram.org/bots/api#chatmembermember
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Member->value))]
class ChatMemberMember extends AbstractChatMember
{
    /**
     * @param User $user Information about the user
     */
    public function __construct(
        protected User $user,
    ) {
        parent::__construct(ChatMemberStatusEnum::Member);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): ChatMemberMember
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
