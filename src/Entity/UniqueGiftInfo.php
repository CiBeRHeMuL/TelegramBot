<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes a service message about a unique gift that was sent or received.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftinfo
 */
class UniqueGiftInfo extends AbstractEntity
{
    /**
     * @param UniqueGift $gift Information about the gift
     * @param string $origin Origin of the gift. Currently, either “upgrade” or “transfer”
     * @param string|null $owned_gift_id Optional. Unique identifier of the received gift for the bot; only present for gifts received
     * on behalf of business accounts
     * @param int|null $transfer_star_count Optional. Number of Telegram Stars that must be paid to transfer the gift; omitted if
     * the bot cannot transfer the gift
     *
     * @see https://core.telegram.org/bots/api#uniquegift UniqueGift
     */
    public function __construct(
        protected UniqueGift $gift,
        protected string $origin,
        protected string|null $owned_gift_id = null,
        protected int|null $transfer_star_count = null,
    ) {
        parent::__construct();
    }

    public function getGift(): UniqueGift
    {
        return $this->gift;
    }

    public function setGift(UniqueGift $gift): UniqueGiftInfo
    {
        $this->gift = $gift;
        return $this;
    }

    public function getOrigin(): string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): UniqueGiftInfo
    {
        $this->origin = $origin;
        return $this;
    }

    public function getOwnedGiftId(): string|null
    {
        return $this->owned_gift_id;
    }

    public function setOwnedGiftId(string|null $owned_gift_id): UniqueGiftInfo
    {
        $this->owned_gift_id = $owned_gift_id;
        return $this;
    }

    public function getTransferStarCount(): int|null
    {
        return $this->transfer_star_count;
    }

    public function setTransferStarCount(int|null $transfer_star_count): UniqueGiftInfo
    {
        $this->transfer_star_count = $transfer_star_count;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'gift' => $this->gift->toArray(),
            'origin' => $this->origin,
            'owned_gift_id' => $this->owned_gift_id,
            'transfer_star_count' => $this->transfer_star_count,
        ];
    }
}
