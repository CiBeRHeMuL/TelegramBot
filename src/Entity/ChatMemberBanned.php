<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a chat member that was banned in the chat and can't return to the chat or view chat messages.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_member_banned
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatMemberBanned, Telegram, Bot API, DTO, chat_member_banned
// STRUCTURE: ▶ ┌user,until_date┐ → ∑ ChatMemberBanned
// region CLASS_ChatMemberBanned

/**
 * Represents a chat member that was banned in the chat and can't return to the chat or view chat messages.
 *
 * @see https://core.telegram.org/bots/api#chatmember chat member
 * @see https://core.telegram.org/bots/api#chatmemberbanned
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Kicked->value))]
final class ChatMemberBanned extends AbstractChatMember
{
    /**
     * @param User $user       Information about the user
     * @param int  $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is banned forever
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $user,
        protected int $until_date,
    ) {
        parent::__construct(ChatMemberStatusEnum::Kicked);
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
     * @return ChatMemberBanned
     */
    public function setUser(User $user): ChatMemberBanned
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return int
     */
    public function getUntilDate(): int
    {
        return $this->until_date;
    }

    /**
     * @param int $until_date
     *
     * @return ChatMemberBanned
     */
    public function setUntilDate(int $until_date): ChatMemberBanned
    {
        $this->until_date = $until_date;

        return $this;
    }
}
// endregion CLASS_ChatMemberBanned
