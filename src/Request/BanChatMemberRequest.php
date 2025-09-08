<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#banchatmember
 */
class BanChatMemberRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target group or username of the target supergroup or channel (in the format
     * \@channelusername)
     * @param int $user_id Unique identifier of the target user
     * @param bool|null $revoke_messages Pass True to delete all messages from the chat for the user that is being removed. If False,
     * the user will be able to see messages in the group that were sent before the user was removed. Always True for supergroups
     * and channels.
     * @param int|null $until_date Date when the user will be unbanned; Unix time. If user is banned for more than 366 days or less
     * than 30 seconds from the current time they are considered to be banned forever. Applied for supergroups and channels only.
     */
    public function __construct(
        private ChatId $chat_id,
        private int $user_id,
        private ?bool $revoke_messages = null,
        private ?int $until_date = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): BanChatMemberRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): BanChatMemberRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getRevokeMessages(): ?bool
    {
        return $this->revoke_messages;
    }

    public function setRevokeMessages(?bool $revoke_messages): BanChatMemberRequest
    {
        $this->revoke_messages = $revoke_messages;
        return $this;
    }

    public function getUntilDate(): ?int
    {
        return $this->until_date;
    }

    public function setUntilDate(?int $until_date): BanChatMemberRequest
    {
        $this->until_date = $until_date;
        return $this;
    }
}
