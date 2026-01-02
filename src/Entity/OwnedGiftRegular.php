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
     * gift; omitted if the gift cannot be converted to Telegram Stars; for gifts received on behalf of business accounts only
     * @param MessageEntity[]|null $entities Optional. Special entities that appear in the text
     * @param bool|null $is_private Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone
     * will be able to see them
     * @param bool|null $is_saved Optional. True, if the gift is displayed on the account's profile page; for gifts received on behalf
     * of business accounts only
     * @param string|null $owned_gift_id Optional. Unique identifier of the gift for the bot; for gifts received on behalf of business
     * accounts only
     * @param int|null $prepaid_upgrade_star_count Optional. Number of Telegram Stars that were paid for the ability to upgrade the
     * gift
     * @param User|null $sender_user Optional. Sender of the gift if it is a known user
     * @param string|null $text Optional. Text of the message that was added to the gift
     * @param bool|null $was_refunded Optional. True, if the gift was refunded and isn't available anymore
     * @param bool|null $is_upgrade_separate Optional. True, if the gift's upgrade was purchased after the gift was sent; for gifts
     * received on behalf of business accounts only
     * @param int|null $unique_gift_number Optional. Unique number reserved for this gift when upgraded. See the number field in
     * UniqueGift
     *
     * @see https://core.telegram.org/bots/api#gift Gift
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#uniquegift UniqueGift
     */
    public function __construct(
        protected Gift $gift,
        protected int $send_date,
        protected ?bool $can_be_upgraded = null,
        protected ?int $convert_star_count = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $entities = null,
        protected ?bool $is_private = null,
        protected ?bool $is_saved = null,
        protected ?string $owned_gift_id = null,
        protected ?int $prepaid_upgrade_star_count = null,
        protected ?User $sender_user = null,
        protected ?string $text = null,
        protected ?bool $was_refunded = null,
        protected ?bool $is_upgrade_separate = null,
        protected ?int $unique_gift_number = null,
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
    public function getCanBeUpgraded(): ?bool
    {
        return $this->can_be_upgraded;
    }

    /**
     * @param bool|null $can_be_upgraded
     *
     * @return OwnedGiftRegular
     */
    public function setCanBeUpgraded(?bool $can_be_upgraded): OwnedGiftRegular
    {
        $this->can_be_upgraded = $can_be_upgraded;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getConvertStarCount(): ?int
    {
        return $this->convert_star_count;
    }

    /**
     * @param int|null $convert_star_count
     *
     * @return OwnedGiftRegular
     */
    public function setConvertStarCount(?int $convert_star_count): OwnedGiftRegular
    {
        $this->convert_star_count = $convert_star_count;
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
     * @return OwnedGiftRegular
     */
    public function setEntities(?array $entities): OwnedGiftRegular
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
     * @return OwnedGiftRegular
     */
    public function setIsPrivate(?bool $is_private): OwnedGiftRegular
    {
        $this->is_private = $is_private;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsSaved(): ?bool
    {
        return $this->is_saved;
    }

    /**
     * @param bool|null $is_saved
     *
     * @return OwnedGiftRegular
     */
    public function setIsSaved(?bool $is_saved): OwnedGiftRegular
    {
        $this->is_saved = $is_saved;
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
     * @return OwnedGiftRegular
     */
    public function setOwnedGiftId(?string $owned_gift_id): OwnedGiftRegular
    {
        $this->owned_gift_id = $owned_gift_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPrepaidUpgradeStarCount(): ?int
    {
        return $this->prepaid_upgrade_star_count;
    }

    /**
     * @param int|null $prepaid_upgrade_star_count
     *
     * @return OwnedGiftRegular
     */
    public function setPrepaidUpgradeStarCount(?int $prepaid_upgrade_star_count): OwnedGiftRegular
    {
        $this->prepaid_upgrade_star_count = $prepaid_upgrade_star_count;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getSenderUser(): ?User
    {
        return $this->sender_user;
    }

    /**
     * @param User|null $sender_user
     *
     * @return OwnedGiftRegular
     */
    public function setSenderUser(?User $sender_user): OwnedGiftRegular
    {
        $this->sender_user = $sender_user;
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
     * @return OwnedGiftRegular
     */
    public function setText(?string $text): OwnedGiftRegular
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getWasRefunded(): ?bool
    {
        return $this->was_refunded;
    }

    /**
     * @param bool|null $was_refunded
     *
     * @return OwnedGiftRegular
     */
    public function setWasRefunded(?bool $was_refunded): OwnedGiftRegular
    {
        $this->was_refunded = $was_refunded;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsUpgradeSeparate(): ?bool
    {
        return $this->is_upgrade_separate;
    }

    /**
     * @param bool|null $is_upgrade_separate
     *
     * @return OwnedGiftRegular
     */
    public function setIsUpgradeSeparate(?bool $is_upgrade_separate): OwnedGiftRegular
    {
        $this->is_upgrade_separate = $is_upgrade_separate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUniqueGiftNumber(): ?int
    {
        return $this->unique_gift_number;
    }

    /**
     * @param int|null $unique_gift_number
     *
     * @return OwnedGiftRegular
     */
    public function setUniqueGiftNumber(?int $unique_gift_number): OwnedGiftRegular
    {
        $this->unique_gift_number = $unique_gift_number;
        return $this;
    }
}
