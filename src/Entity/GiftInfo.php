<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * Describes a service message about a regular gift that was sent or received.
 *
 * @link https://core.telegram.org/bots/api#giftinfo
 */
final class GiftInfo implements EntityInterface
{
    /**
     * @param Gift $gift Information about the gift
     * @param bool|null $can_be_upgraded Optional. True, if the gift can be upgraded to a unique gift
     * @param int|null $convert_star_count Optional. Number of Telegram Stars that can be claimed by the receiver by converting the
     * gift; omitted if conversion to Telegram Stars is impossible
     * @param MessageEntity[]|null $entities Optional. Special entities that appear in the text
     * @param bool|null $is_private Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone
     * will be able to see them
     * @param string|null $owned_gift_id Optional. Unique identifier of the received gift for the bot; only present for gifts received
     * on behalf of business accounts
     * @param int|null $prepaid_upgrade_star_count Optional. Number of Telegram Stars that were prepaid by the sender for the ability
     * to upgrade the gift
     * @param string|null $text Optional. Text of the message that was added to the gift
     *
     * @see https://core.telegram.org/bots/api#gift Gift
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected Gift $gift,
        protected ?bool $can_be_upgraded = null,
        protected ?int $convert_star_count = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $entities = null,
        protected ?bool $is_private = null,
        protected ?string $owned_gift_id = null,
        protected ?int $prepaid_upgrade_star_count = null,
        protected ?string $text = null,
    ) {}

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
     * @return GiftInfo
     */
    public function setGift(Gift $gift): GiftInfo
    {
        $this->gift = $gift;
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
     * @return GiftInfo
     */
    public function setCanBeUpgraded(?bool $can_be_upgraded): GiftInfo
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
     * @return GiftInfo
     */
    public function setConvertStarCount(?int $convert_star_count): GiftInfo
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
     * @return GiftInfo
     */
    public function setEntities(?array $entities): GiftInfo
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
     * @return GiftInfo
     */
    public function setIsPrivate(?bool $is_private): GiftInfo
    {
        $this->is_private = $is_private;
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
     * @return GiftInfo
     */
    public function setOwnedGiftId(?string $owned_gift_id): GiftInfo
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
     * @return GiftInfo
     */
    public function setPrepaidUpgradeStarCount(?int $prepaid_upgrade_star_count): GiftInfo
    {
        $this->prepaid_upgrade_star_count = $prepaid_upgrade_star_count;
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
     * @return GiftInfo
     */
    public function setText(?string $text): GiftInfo
    {
        $this->text = $text;
        return $this;
    }
}
