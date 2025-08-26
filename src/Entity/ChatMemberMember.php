<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;
use stdClass;

/**
 * Represents a chat member that has no additional privileges or restrictions.
 *
 * @see https://core.telegram.org/bots/api#chatmember chat member
 * @link https://core.telegram.org/bots/api#chatmembermember
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Member->value))]
final class ChatMemberMember extends AbstractChatMember
{
    /**
     * @param User $user Information about the user
     * @param int|null $until_date Optional. Date when the user's subscription will expire; Unix time
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
        protected int|null $until_date = null,
    ) {
        parent::__construct(ChatMemberStatusEnum::Member);
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
     * @return ChatMemberMember
     */
    public function setUser(User $user): ChatMemberMember
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUntilDate(): int|null
    {
        return $this->until_date;
    }

    /**
     * @param int|null $until_date
     *
     * @return ChatMemberMember
     */
    public function setUntilDate(int|null $until_date): ChatMemberMember
    {
        $this->until_date = $until_date;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'user' => $this->user->toArray(),
            'until_date' => $this->until_date,
            'status' => $this->status->value,
        ];
    }
}
