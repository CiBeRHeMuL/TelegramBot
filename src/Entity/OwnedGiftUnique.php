<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\OwnedGiftTypeEnum;
use stdClass;

/**
 * Describes a unique gift received and owned by a user or a chat.
 *
 * @link https://core.telegram.org/bots/api#ownedgiftunique
 */
#[BuildIf(new FieldIsChecker('type', OwnedGiftTypeEnum::Unique->value))]
class OwnedGiftUnique extends AbstractOwnedGift
{
    /**
     * @param UniqueGift $gift Information about the unique gift
     * @param int $send_date Date the gift was sent in Unix time
     * @param bool|null $can_be_transferred Optional. True, if the gift can be transferred to another owner; for gifts received on
     * behalf of business accounts only
     * @param bool|null $is_saved Optional. True, if the gift is displayed on the account's profile page; for gifts received on behalf
     * of business accounts only
     * @param string|null $owned_gift_id Optional. Unique identifier of the received gift for the bot; for gifts received on behalf
     * of business accounts only
     * @param User|null $sender_user Optional. Sender of the gift if it is a known user
     * @param int|null $transfer_star_count Optional. Number of Telegram Stars that must be paid to transfer the gift; omitted if
     * the bot cannot transfer the gift
     * @param int|null $next_transfer_date Optional. Point in time (Unix timestamp) when the gift can be transferred. If it is in
     * the past, then the gift can be transferred now
     *
     * @see https://core.telegram.org/bots/api#uniquegift UniqueGift
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected UniqueGift $gift,
        protected int $send_date,
        protected bool|null $can_be_transferred = null,
        protected bool|null $is_saved = null,
        protected string|null $owned_gift_id = null,
        protected User|null $sender_user = null,
        protected int|null $transfer_star_count = null,
        protected int|null $next_transfer_date = null,
    ) {
        parent::__construct(OwnedGiftTypeEnum::Unique);
    }

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
     * @return OwnedGiftUnique
     */
    public function setGift(UniqueGift $gift): OwnedGiftUnique
    {
        $this->gift = $gift;
        return $this;
    }

    /**
     * @return int
     */
    public function getSendDate(): int
    {
        return $this->send_date;
    }

    /**
     * @param int $send_date
     *
     * @return OwnedGiftUnique
     */
    public function setSendDate(int $send_date): OwnedGiftUnique
    {
        $this->send_date = $send_date;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanBeTransferred(): bool|null
    {
        return $this->can_be_transferred;
    }

    /**
     * @param bool|null $can_be_transferred
     *
     * @return OwnedGiftUnique
     */
    public function setCanBeTransferred(bool|null $can_be_transferred): OwnedGiftUnique
    {
        $this->can_be_transferred = $can_be_transferred;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsSaved(): bool|null
    {
        return $this->is_saved;
    }

    /**
     * @param bool|null $is_saved
     *
     * @return OwnedGiftUnique
     */
    public function setIsSaved(bool|null $is_saved): OwnedGiftUnique
    {
        $this->is_saved = $is_saved;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOwnedGiftId(): string|null
    {
        return $this->owned_gift_id;
    }

    /**
     * @param string|null $owned_gift_id
     *
     * @return OwnedGiftUnique
     */
    public function setOwnedGiftId(string|null $owned_gift_id): OwnedGiftUnique
    {
        $this->owned_gift_id = $owned_gift_id;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getSenderUser(): User|null
    {
        return $this->sender_user;
    }

    /**
     * @param User|null $sender_user
     *
     * @return OwnedGiftUnique
     */
    public function setSenderUser(User|null $sender_user): OwnedGiftUnique
    {
        $this->sender_user = $sender_user;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTransferStarCount(): int|null
    {
        return $this->transfer_star_count;
    }

    /**
     * @param int|null $transfer_star_count
     *
     * @return OwnedGiftUnique
     */
    public function setTransferStarCount(int|null $transfer_star_count): OwnedGiftUnique
    {
        $this->transfer_star_count = $transfer_star_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNextTransferDate(): int|null
    {
        return $this->next_transfer_date;
    }

    /**
     * @param int|null $next_transfer_date
     *
     * @return OwnedGiftUnique
     */
    public function setNextTransferDate(int|null $next_transfer_date): OwnedGiftUnique
    {
        $this->next_transfer_date = $next_transfer_date;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'gift' => $this->gift->toArray(),
            'send_date' => $this->send_date,
            'can_be_transferred' => $this->can_be_transferred,
            'is_saved' => $this->is_saved,
            'owned_gift_id' => $this->owned_gift_id,
            'sender_user' => $this->sender_user?->toArray(),
            'transfer_star_count' => $this->transfer_star_count,
            'next_transfer_date' => $this->next_transfer_date,
            'type' => $this->type->value,
        ];
    }
}
