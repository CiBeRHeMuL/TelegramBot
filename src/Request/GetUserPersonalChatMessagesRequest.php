<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#getuserpersonalchatmessages
 */
class GetUserPersonalChatMessagesRequest implements RequestInterface
{
    /**
     * @param int $limit The maximum number of messages to return; 1-20
     * @param int $user_id Unique identifier for the target user
     */
    public function __construct(
        private int $limit,
        private int $user_id,
    ) {}

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): GetUserPersonalChatMessagesRequest
    {
        $this->limit = $limit;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetUserPersonalChatMessagesRequest
    {
        $this->user_id = $user_id;
        return $this;
    }
}
