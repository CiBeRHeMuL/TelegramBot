<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a chat member that has no additional privileges or restrictions.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_member_member
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatMemberMember, Telegram, Bot API, DTO, chat_member_member
// STRUCTURE: ▶ ┌user,until_date,tag┐ → ∑ ChatMemberMember
// region CLASS_ChatMemberMember

/**
 * Represents a chat member that has no additional privileges or restrictions.
 *
 * @see https://core.telegram.org/bots/api#chatmember chat member
 * @see https://core.telegram.org/bots/api#chatmembermember
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Member->value))]
final class ChatMemberMember extends AbstractChatMember
{
    /**
     * @param User        $user       Information about the user
     * @param int|null    $until_date Optional. Date when the user's subscription will expire; Unix time
     * @param string|null $tag        Optional. Tag of the member
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
        protected ?int $until_date = null,
        protected ?string $tag = null,
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
    public function getUntilDate(): ?int
    {
        return $this->until_date;
    }

    /**
     * @param int|null $until_date
     *
     * @return ChatMemberMember
     */
    public function setUntilDate(?int $until_date): ChatMemberMember
    {
        $this->until_date = $until_date;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * @param string|null $tag
     *
     * @return ChatMemberMember
     */
    public function setTag(?string $tag): ChatMemberMember
    {
        $this->tag = $tag;

        return $this;
    }
}
// endregion CLASS_ChatMemberMember
