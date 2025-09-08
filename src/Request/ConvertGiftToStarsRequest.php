<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#convertgifttostars
 */
class ConvertGiftToStarsRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string $owned_gift_id Unique identifier of the regular gift that should be converted to Telegram Stars
     */
    public function __construct(
        private string $business_connection_id,
        private string $owned_gift_id,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): ConvertGiftToStarsRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getOwnedGiftId(): string
    {
        return $this->owned_gift_id;
    }

    public function setOwnedGiftId(string $owned_gift_id): ConvertGiftToStarsRequest
    {
        $this->owned_gift_id = $owned_gift_id;
        return $this;
    }
}
