<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object describes the types of gifts that can be gifted to a user or a chat.
 *
 * @link https://core.telegram.org/bots/api#acceptedgifttypes
 */
class AcceptedGiftTypes extends AbstractEntity
{
    /**
     * @param bool $unlimited_gifts True, if unlimited regular gifts are accepted
     * @param bool $limited_gifts True, if limited regular gifts are accepted
     * @param bool $unique_gifts True, if unique gifts or gifts that can be upgraded to unique for free are accepted
     * @param bool $premium_subscription True, if a Telegram Premium subscription is accepted
     */
    public function __construct(
        protected bool $unlimited_gifts,
        protected bool $limited_gifts,
        protected bool $unique_gifts,
        protected bool $premium_subscription,
    ) {
        parent::__construct();
    }

    public function getUnlimitedGifts(): bool
    {
        return $this->unlimited_gifts;
    }

    public function setUnlimitedGifts(bool $unlimited_gifts): AcceptedGiftTypes
    {
        $this->unlimited_gifts = $unlimited_gifts;
        return $this;
    }

    public function getLimitedGifts(): bool
    {
        return $this->limited_gifts;
    }

    public function setLimitedGifts(bool $limited_gifts): AcceptedGiftTypes
    {
        $this->limited_gifts = $limited_gifts;
        return $this;
    }

    public function getUniqueGifts(): bool
    {
        return $this->unique_gifts;
    }

    public function setUniqueGifts(bool $unique_gifts): AcceptedGiftTypes
    {
        $this->unique_gifts = $unique_gifts;
        return $this;
    }

    public function getPremiumSubscription(): bool
    {
        return $this->premium_subscription;
    }

    public function setPremiumSubscription(bool $premium_subscription): AcceptedGiftTypes
    {
        $this->premium_subscription = $premium_subscription;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'unlimited_gifts' => $this->unlimited_gifts,
            'limited_gifts' => $this->limited_gifts,
            'unique_gifts' => $this->unique_gifts,
            'premium_subscription' => $this->premium_subscription,
        ];
    }
}
