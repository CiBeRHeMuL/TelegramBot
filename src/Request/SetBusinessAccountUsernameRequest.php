<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#setbusinessaccountusername
 */
class SetBusinessAccountUsernameRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string|null $username The new value of the username for the business account; 0-32 characters
     */
    public function __construct(
        private string $business_connection_id,
        private string|null $username = null,
    ) {
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): SetBusinessAccountUsernameRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getUsername(): string|null
    {
        return $this->username;
    }

    public function setUsername(string|null $username): SetBusinessAccountUsernameRequest
    {
        $this->username = $username;
        return $this;
    }
}
