<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#getmanagedbottoken
 */
class GetManagedBotTokenRequest implements RequestInterface
{
    /**
     * @param int $user_id User identifier of the managed bot whose token will be returned
     */
    public function __construct(
        private int $user_id,
    ) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetManagedBotTokenRequest
    {
        $this->user_id = $user_id;
        return $this;
    }
}
