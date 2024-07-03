<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;
use stdClass;

/**
 * Represents a chat member that owns the chat and has all administrator privileges.
 * @link https://core.telegram.org/bots/api#chatmemberowner
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Creator->value))]
class ChatMemberOwner extends AbstractChatMember
{
    /**
     * @param User $user Information about the user
     * @param bool $is_anonymous True, if the user's presence in the chat is hidden
     * @param string|null $custom_title Optional. Custom title for this user
     */
    public function __construct(
        protected User $user,
        protected bool $is_anonymous,
        protected string|null $custom_title = null,
    ) {
        parent::__construct(ChatMemberStatusEnum::Creator);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): ChatMemberOwner
    {
        $this->user = $user;
        return $this;
    }

    public function getIsAnonymous(): bool
    {
        return $this->is_anonymous;
    }

    public function setIsAnonymous(bool $is_anonymous): ChatMemberOwner
    {
        $this->is_anonymous = $is_anonymous;
        return $this;
    }

    public function getCustomTitle(): string|null
    {
        return $this->custom_title;
    }

    public function setCustomTitle(string|null $custom_title): ChatMemberOwner
    {
        $this->custom_title = $custom_title;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'status' => $this->status,
            'user' => $this->user->toArray(),
            'is_anonymous' => $this->is_anonymous,
            'custom_title' => $this->custom_title,
        ];
    }
}
