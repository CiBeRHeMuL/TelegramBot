<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;
use stdClass;

/**
 * Represents a chat member that owns the chat and has all administrator privileges.
 *
 * @see https://core.telegram.org/bots/api#chatmember chat member
 * @link https://core.telegram.org/bots/api#chatmemberowner
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Creator->value))]
class ChatMemberOwner extends AbstractChatMember
{
    /**
     * @param User $user Information about the user
     * @param bool $is_anonymous True, if the user's presence in the chat is hidden
     * @param string|null $custom_title Optional. Custom title for this user
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
        protected bool $is_anonymous,
        protected string|null $custom_title = null,
    ) {
        parent::__construct(ChatMemberStatusEnum::Creator);
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
     * @return ChatMemberOwner
     */
    public function setUser(User $user): ChatMemberOwner
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAnonymous(): bool
    {
        return $this->is_anonymous;
    }

    /**
     * @param bool $is_anonymous
     *
     * @return ChatMemberOwner
     */
    public function setIsAnonymous(bool $is_anonymous): ChatMemberOwner
    {
        $this->is_anonymous = $is_anonymous;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomTitle(): string|null
    {
        return $this->custom_title;
    }

    /**
     * @param string|null $custom_title
     *
     * @return ChatMemberOwner
     */
    public function setCustomTitle(string|null $custom_title): ChatMemberOwner
    {
        $this->custom_title = $custom_title;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'user' => $this->user->toArray(),
            'is_anonymous' => $this->is_anonymous,
            'custom_title' => $this->custom_title,
            'status' => $this->status->value,
        ];
    }
}
