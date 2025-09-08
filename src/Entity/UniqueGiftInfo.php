<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\UniqueGiftInfoOriginEnum;

/**
 * Describes a service message about a unique gift that was sent or received.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftinfo
 */
final class UniqueGiftInfo implements EntityInterface
{
    /**
     * @param UniqueGift $gift Information about the gift
     * @param UniqueGiftInfoOriginEnum $origin Origin of the gift. Currently, either “upgrade” for gifts upgraded from regular
     * gifts, “transfer” for gifts transferred from other users or channels, or “resale” for gifts bought from other users
     * @param string|null $owned_gift_id Optional. Unique identifier of the received gift for the bot; only present for gifts received
     * on behalf of business accounts
     * @param int|null $transfer_star_count Optional. Number of Telegram Stars that must be paid to transfer the gift; omitted if
     * the bot cannot transfer the gift
     * @param int|null $last_resale_star_count Optional. For gifts bought from other users, the price paid for the gift
     * @param int|null $next_transfer_date Optional. Point in time (Unix timestamp) when the gift can be transferred. If it is in
     * the past, then the gift can be transferred now
     *
     * @see https://core.telegram.org/bots/api#uniquegift UniqueGift
     */
    public function __construct(
        protected UniqueGift $gift,
        protected UniqueGiftInfoOriginEnum $origin,
        protected ?string $owned_gift_id = null,
        protected ?int $transfer_star_count = null,
        protected ?int $last_resale_star_count = null,
        protected ?int $next_transfer_date = null,
    ) {}

    /**
     * @return UniqueGift
     */
    public function getGift(): UniqueGift
    {
        return $this->gift;
    }

    /**
     * @param UniqueGift $gift
     *
     * @return UniqueGiftInfo
     */
    public function setGift(UniqueGift $gift): UniqueGiftInfo
    {
        $this->gift = $gift;
        return $this;
    }

    /**
     * @return UniqueGiftInfoOriginEnum
     */
    public function getOrigin(): UniqueGiftInfoOriginEnum
    {
        return $this->origin;
    }

    /**
     * @param UniqueGiftInfoOriginEnum $origin
     *
     * @return UniqueGiftInfo
     */
    public function setOrigin(UniqueGiftInfoOriginEnum $origin): UniqueGiftInfo
    {
        $this->origin = $origin;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOwnedGiftId(): ?string
    {
        return $this->owned_gift_id;
    }

    /**
     * @param string|null $owned_gift_id
     *
     * @return UniqueGiftInfo
     */
    public function setOwnedGiftId(?string $owned_gift_id): UniqueGiftInfo
    {
        $this->owned_gift_id = $owned_gift_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTransferStarCount(): ?int
    {
        return $this->transfer_star_count;
    }

    /**
     * @param int|null $transfer_star_count
     *
     * @return UniqueGiftInfo
     */
    public function setTransferStarCount(?int $transfer_star_count): UniqueGiftInfo
    {
        $this->transfer_star_count = $transfer_star_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLastResaleStarCount(): ?int
    {
        return $this->last_resale_star_count;
    }

    /**
     * @param int|null $last_resale_star_count
     *
     * @return UniqueGiftInfo
     */
    public function setLastResaleStarCount(?int $last_resale_star_count): UniqueGiftInfo
    {
        $this->last_resale_star_count = $last_resale_star_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNextTransferDate(): ?int
    {
        return $this->next_transfer_date;
    }

    /**
     * @param int|null $next_transfer_date
     *
     * @return UniqueGiftInfo
     */
    public function setNextTransferDate(?int $next_transfer_date): UniqueGiftInfo
    {
        $this->next_transfer_date = $next_transfer_date;
        return $this;
    }
}
