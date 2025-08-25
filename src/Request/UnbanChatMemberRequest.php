<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#unbanchatmember
 */
class UnbanChatMemberRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target group or username of the target supergroup or channel (in the format
     * \@channelusername)
     * @param int $user_id Unique identifier of the target user
     * @param bool|null $only_if_banned Do nothing if the user is not banned
     */
    public function __construct(
        private ChatId $chat_id,
        private int $user_id,
        private bool|null $only_if_banned = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): UnbanChatMemberRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): UnbanChatMemberRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getOnlyIfBanned(): bool|null
    {
        return $this->only_if_banned;
    }

    public function setOnlyIfBanned(bool|null $only_if_banned): UnbanChatMemberRequest
    {
        $this->only_if_banned = $only_if_banned;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'user_id' => $this->user_id,
            'only_if_banned' => $this->only_if_banned,
        ];
    }
}
