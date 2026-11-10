<?php

namespace AndrewGos\TelegramBot\Request;

// region CLASS_DeleteBusinessAccountGiftRequest
/**
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#deletebusinessaccountgift
 */
class DeleteBusinessAccountGiftRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string $owned_gift_id          Unique identifier of the regular gift that should be deleted
     */
    public function __construct(
        private string $business_connection_id,
        private string $owned_gift_id,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): DeleteBusinessAccountGiftRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }

    public function getOwnedGiftId(): string
    {
        return $this->owned_gift_id;
    }

    public function setOwnedGiftId(string $owned_gift_id): DeleteBusinessAccountGiftRequest
    {
        $this->owned_gift_id = $owned_gift_id;

        return $this;
    }
}
// endregion CLASS_DeleteBusinessAccountGiftRequest
