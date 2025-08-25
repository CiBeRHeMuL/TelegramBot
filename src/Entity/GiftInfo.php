<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * Describes a service message about a regular gift that was sent or received.
 *
 * @link https://core.telegram.org/bots/api#giftinfo
 */
class GiftInfo extends AbstractEntity
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
        protected bool|null $can_be_upgraded = null,
        protected int|null $convert_star_count = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $entities = null,
        protected bool|null $is_private = null,
        protected string|null $owned_gift_id = null,
        protected int|null $prepaid_upgrade_star_count = null,
        protected string|null $text = null,
    ) {
        parent::__construct();
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
    public function getCanBeUpgraded(): bool|null
    {
        return $this->can_be_upgraded;
    }

    /**
     * @param bool|null $can_be_upgraded
     *
     * @return GiftInfo
     */
    public function setCanBeUpgraded(bool|null $can_be_upgraded): GiftInfo
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
     * @return GiftInfo
     */
    public function setConvertStarCount(int|null $convert_star_count): GiftInfo
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
     * @return GiftInfo
     */
    public function setEntities(array|null $entities): GiftInfo
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
     * @return GiftInfo
     */
    public function setIsPrivate(bool|null $is_private): GiftInfo
    {
        $this->is_private = $is_private;
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
     * @return GiftInfo
     */
    public function setOwnedGiftId(string|null $owned_gift_id): GiftInfo
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
     * @return GiftInfo
     */
    public function setPrepaidUpgradeStarCount(int|null $prepaid_upgrade_star_count): GiftInfo
    {
        $this->prepaid_upgrade_star_count = $prepaid_upgrade_star_count;
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
     * @return GiftInfo
     */
    public function setText(string|null $text): GiftInfo
    {
        $this->text = $text;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'gift' => $this->gift->toArray(),
            'can_be_upgraded' => $this->can_be_upgraded,
            'convert_star_count' => $this->convert_star_count,
            'entities' => $this->entities !== null
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->entities)
                : null,
            'is_private' => $this->is_private,
            'owned_gift_id' => $this->owned_gift_id,
            'prepaid_upgrade_star_count' => $this->prepaid_upgrade_star_count,
            'text' => $this->text,
        ];
    }
}
