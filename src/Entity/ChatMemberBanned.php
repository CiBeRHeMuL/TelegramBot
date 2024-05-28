<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatMemberStatusEnum;
use stdClass;

/**
 * Represents a chat member that was banned in the chat and can't return to the chat or view chat messages.
 * @link https://core.telegram.org/bots/api#chatmemberbanned
 */
#[BuildIf(new FieldIsChecker('status', ChatMemberStatusEnum::Kicked->value))]
class ChatMemberBanned extends AbstractChatMember
{
    /**
     * @param User $user Information about the user
     * @param int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is banned forever
     */
    public function __construct(
        private User $user,
        private int $until_date,
    ) {
        parent::__construct(ChatMemberStatusEnum::Kicked);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): ChatMemberBanned
    {
        $this->user = $user;
        return $this;
    }

    public function getUntilDate(): int
    {
        return $this->until_date;
    }

    public function setUntilDate(int $until_date): ChatMemberBanned
    {
        $this->until_date = $until_date;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'status' => $this->status,
            'user' => $this->user->toArray(),
            'until_date' => $this->until_date,
        ];
    }
}
