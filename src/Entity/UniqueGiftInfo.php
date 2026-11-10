<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\UniqueGiftInfoOriginEnum;

// region CLASS_UniqueGiftInfo
/**
 * Describes a service message about a unique gift that was sent or received.
 *
 * @see https://core.telegram.org/bots/api#uniquegiftinfo
 */
final class UniqueGiftInfo implements EntityInterface
{
    /**
     * @param UniqueGift               $gift                 Information about the gift
     * @param UniqueGiftInfoOriginEnum $origin               Origin of the gift. Currently, either “upgrade” for gifts upgraded from regular
     *                                                       gifts, “transfer” for gifts transferred from other users or channels, “resale” for gifts bought from other users,
     *                                                       “gifted_upgrade” for upgrades purchased after the gift was sent, or “offer” for gifts bought or sold through gift
     *                                                       purchase offers
     * @param string|null              $owned_gift_id        Optional. Unique identifier of the received gift for the bot; only present for gifts received
     *                                                       on behalf of business accounts
     * @param int|null                 $transfer_star_count  Optional. Number of Telegram Stars that must be paid to transfer the gift; omitted if
     *                                                       the bot cannot transfer the gift
     * @param int|null                 $next_transfer_date   Optional. Point in time (Unix timestamp) when the gift can be transferred. If it is in
     *                                                       the past, then the gift can be transferred now
     * @param string|null              $last_resale_currency Optional. For gifts bought from other users, the currency in which the payment for
     *                                                       the gift was done. Currently, one of “XTR” for Telegram Stars or “TON” for toncoins.
     * @param int|null                 $last_resale_amount   Optional. For gifts bought from other users, the price paid for the gift in either Telegram
     *                                                       Stars or nanotoncoins
     * @param string|null              $text                 Optional. Text of the message that was added to the gift
     * @param MessageEntity[]|null     $entities             Optional. Special entities that appear in the text
     * @param bool|null                $is_private           Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise,
     *                                                       everyone will be able to see them
     *
     * @see https://core.telegram.org/bots/api#uniquegift UniqueGift
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected UniqueGift $gift,
        protected UniqueGiftInfoOriginEnum $origin,
        protected ?string $owned_gift_id = null,
        protected ?int $transfer_star_count = null,
        protected ?int $next_transfer_date = null,
        protected ?string $last_resale_currency = null,
        protected ?int $last_resale_amount = null,
        protected ?string $text = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $entities = null,
        protected ?bool $is_private = null,
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

    /**
     * @return string|null
     */
    public function getLastResaleCurrency(): ?string
    {
        return $this->last_resale_currency;
    }

    /**
     * @param string|null $last_resale_currency
     *
     * @return UniqueGiftInfo
     */
    public function setLastResaleCurrency(?string $last_resale_currency): UniqueGiftInfo
    {
        $this->last_resale_currency = $last_resale_currency;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLastResaleAmount(): ?int
    {
        return $this->last_resale_amount;
    }

    /**
     * @param int|null $last_resale_amount
     *
     * @return UniqueGiftInfo
     */
    public function setLastResaleAmount(?int $last_resale_amount): UniqueGiftInfo
    {
        $this->last_resale_amount = $last_resale_amount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     *
     * @return UniqueGiftInfo
     */
    public function setText(?string $text): UniqueGiftInfo
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|null $entities
     *
     * @return UniqueGiftInfo
     */
    public function setEntities(?array $entities): UniqueGiftInfo
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsPrivate(): ?bool
    {
        return $this->is_private;
    }

    /**
     * @param bool|null $is_private
     *
     * @return UniqueGiftInfo
     */
    public function setIsPrivate(?bool $is_private): UniqueGiftInfo
    {
        $this->is_private = $is_private;

        return $this;
    }
}

// endregion CLASS_UniqueGiftInfo
