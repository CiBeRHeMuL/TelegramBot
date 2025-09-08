<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#getbusinessconnection
 */
class GetBusinessConnectionRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     */
    public function __construct(
        private string $business_connection_id,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): GetBusinessConnectionRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }
}
