<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\OwnedGiftTypeEnum;

/**
 * Describes a regular gift owned by a user or a chat.
 *
 * @link https://core.telegram.org/bots/api#ownedgiftregular
 */
#[BuildIf(new FieldIsChecker('type', OwnedGiftTypeEnum::Regular->value))]
final class OwnedGiftRegular extends AbstractOwnedGift
{
    /**
     * @param Gift $gift Information about the regular gift
     * @param int $send_date Date the gift was sent in Unix time
     * @param bool|null $can_be_upgraded Optional. True, if the gift can be upgraded to a unique gift; for gifts received on behalf
     * of business accounts only
     * @param int|null $convert_star_count Optional. Number of Telegram Stars that can be claimed by the receiver instead of the
     * gift; omitted if the gift cannot be converted to Telegram Stars
     * @param MessageEntity[]|null $entities Optional. Special entities that appear in the text
     * @param bool|null $is_private Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone
     * will be able to see them
     * @param bool|null $is_saved Optional. True, if the gift is displayed on the account's profile page; for gifts received on behalf
     * of business accounts only
     * @param string|null $owned_gift_id Optional. Unique identifier of the gift for the bot; for gifts received on behalf of business
     * accounts only
     * @param int|null $prepaid_upgrade_star_count Optional. Number of Telegram Stars that were paid by the sender for the ability
     * to upgrade the gift
     * @param User|null $sender_user Optional. Sender of the gift if it is a known user
     * @param string|null $text Optional. Text of the message that was added to the gift
     * @param bool|null $was_refunded Optional. True, if the gift was refunded and isn't available anymore
     *
     * @see https://core.telegram.org/bots/api#gift Gift
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected Gift $gift,
        protected int $send_date,
        protected bool|null $can_be_upgraded = null,
        protected int|null $convert_star_count = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $entities = null,
        protected bool|null $is_private = null,
        protected bool|null $is_saved = null,
        protected string|null $owned_gift_id = null,
        protected int|null $prepaid_upgrade_star_count = null,
        protected User|null $sender_user = null,
        protected string|null $text = null,
        protected bool|null $was_refunded = null,
    ) {
        parent::__construct(OwnedGiftTypeEnum::Regular);
    }

    /**
     * @return Gift
     */
    public function getGift(): Gift
    {
        return $this->gift;
    }

    /**
     * @param Gift $gift
     *
     * @return OwnedGiftRegular
     */
    public function setGift(Gift $gift): OwnedGiftRegular
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
     * @return OwnedGiftRegular
     */
    public function setSendDate(int $send_date): OwnedGiftRegular
    {
        $this->send_date = $send_date;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanBeUpgraded(): bool|null
    {
        return $this->can_be_upgraded;
    }

    /**
     * @param bool|null $can_be_upgraded
     *
     * @return OwnedGiftRegular
     */
    public function setCanBeUpgraded(bool|null $can_be_upgraded): OwnedGiftRegular
    {
        $this->can_be_upgraded = $can_be_upgraded;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getConvertStarCount(): int|null
    {
        return $this->convert_star_count;
    }

    /**
     * @param int|null $convert_star_count
     *
     * @return OwnedGiftRegular
     */
    public function setConvertStarCount(int|null $convert_star_count): OwnedGiftRegular
    {
        $this->convert_star_count = $convert_star_count;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): array|null
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|null $entities
     *
     * @return OwnedGiftRegular
     */
    public function setEntities(array|null $entities): OwnedGiftRegular
    {
        $this->entities = $entities;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsPrivate(): bool|null
    {
        return $this->is_private;
    }

    /**
     * @param bool|null $is_private
     *
     * @return OwnedGiftRegular
     */
    public function setIsPrivate(bool|null $is_private): OwnedGiftRegular
    {
        $this->is_private = $is_private;
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
     * @return OwnedGiftRegular
     */
    public function setIsSaved(bool|null $is_saved): OwnedGiftRegular
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
     * @return OwnedGiftRegular
     */
    public function setOwnedGiftId(string|null $owned_gift_id): OwnedGiftRegular
    {
        $this->owned_gift_id = $owned_gift_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPrepaidUpgradeStarCount(): int|null
    {
        return $this->prepaid_upgrade_star_count;
    }

    /**
     * @param int|null $prepaid_upgrade_star_count
     *
     * @return OwnedGiftRegular
     */
    public function setPrepaidUpgradeStarCount(int|null $prepaid_upgrade_star_count): OwnedGiftRegular
    {
        $this->prepaid_upgrade_star_count = $prepaid_upgrade_star_count;
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
     * @return OwnedGiftRegular
     */
    public function setSenderUser(User|null $sender_user): OwnedGiftRegular
    {
        $this->sender_user = $sender_user;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): string|null
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     *
     * @return OwnedGiftRegular
     */
    public function setText(string|null $text): OwnedGiftRegular
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getWasRefunded(): bool|null
    {
        return $this->was_refunded;
    }

    /**
     * @param bool|null $was_refunded
     *
     * @return OwnedGiftRegular
     */
    public function setWasRefunded(bool|null $was_refunded): OwnedGiftRegular
    {
        $this->was_refunded = $was_refunded;
        return $this;
    }
}
