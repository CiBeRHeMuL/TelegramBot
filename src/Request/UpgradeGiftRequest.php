<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#upgradegift
 */
class UpgradeGiftRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string $owned_gift_id Unique identifier of the regular gift that should be upgraded to a unique one
     * @param bool|null $keep_original_details Pass True to keep the original gift text, sender and receiver in the upgraded gift
     * @param int|null $star_count The amount of Telegram Stars that will be paid for the upgrade from the business account balance.
     * If gift.prepaid_upgrade_star_count > 0, then pass 0, otherwise, the can_transfer_stars business bot right is required and
     * gift.upgrade_star_count must be passed.
     */
    public function __construct(
        private string $business_connection_id,
        private string $owned_gift_id,
        private bool|null $keep_original_details = null,
        private int|null $star_count = null,
    ) {
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): UpgradeGiftRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getOwnedGiftId(): string
    {
        return $this->owned_gift_id;
    }

    public function setOwnedGiftId(string $owned_gift_id): UpgradeGiftRequest
    {
        $this->owned_gift_id = $owned_gift_id;
        return $this;
    }

    public function getKeepOriginalDetails(): bool|null
    {
        return $this->keep_original_details;
    }

    public function setKeepOriginalDetails(bool|null $keep_original_details): UpgradeGiftRequest
    {
        $this->keep_original_details = $keep_original_details;
        return $this;
    }

    public function getStarCount(): int|null
    {
        return $this->star_count;
    }

    public function setStarCount(int|null $star_count): UpgradeGiftRequest
    {
        $this->star_count = $star_count;
        return $this;
    }
}
