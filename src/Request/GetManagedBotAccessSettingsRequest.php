<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#getmanagedbotaccesssettings
 */
class GetManagedBotAccessSettingsRequest implements RequestInterface
{
    /**
     * @param int $user_id User identifier of the managed bot whose access settings will be returned
     */
    public function __construct(
        private int $user_id,
    ) {}

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetManagedBotAccessSettingsRequest
    {
        $this->user_id = $user_id;
        return $this;
    }
}
