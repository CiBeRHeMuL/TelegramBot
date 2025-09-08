<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#getchatmember
 */
class GetChatMemberRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format
     * \@channelusername)
     * @param int $user_id Unique identifier of the target user
     */
    public function __construct(
        private ChatId $chat_id,
        private int $user_id,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): GetChatMemberRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetChatMemberRequest
    {
        $this->user_id = $user_id;
        return $this;
    }
}
