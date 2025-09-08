<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#getuserchatboosts
 */
class GetUserChatBoostsRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the chat or username of the channel (in the format \@channelusername)
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

    public function setChatId(ChatId $chat_id): GetUserChatBoostsRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetUserChatBoostsRequest
    {
        $this->user_id = $user_id;
        return $this;
    }
}
