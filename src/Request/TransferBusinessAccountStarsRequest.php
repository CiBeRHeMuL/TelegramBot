<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#transferbusinessaccountstars
 */
class TransferBusinessAccountStarsRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param int $star_count Number of Telegram Stars to transfer; 1-10000
     */
    public function __construct(
        private string $business_connection_id,
        private int $star_count,
    ) {
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): TransferBusinessAccountStarsRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getStarCount(): int
    {
        return $this->star_count;
    }

    public function setStarCount(int $star_count): TransferBusinessAccountStarsRequest
    {
        $this->star_count = $star_count;
        return $this;
    }
}
