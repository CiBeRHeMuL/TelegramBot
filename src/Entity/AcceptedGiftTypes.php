<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the types of gifts that can be gifted to a user or a chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#acceptedgifttypes
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AcceptedGiftTypes, Telegram Bot API, gift, types, DTO
// STRUCTURE: ▶ ┌unlimited_gifts, limited_gifts, unique_gifts, premium_subscription, gifts_from_channels┐

// region CLASS_AcceptedGiftTypes [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes the types of gifts that can be gifted to a user or a chat.
 *
 * @see https://core.telegram.org/bots/api#acceptedgifttypes
 */
final class AcceptedGiftTypes implements EntityInterface
{
    /**
     * @param bool $unlimited_gifts      True, if unlimited regular gifts are accepted
     * @param bool $limited_gifts        True, if limited regular gifts are accepted
     * @param bool $unique_gifts         True, if unique gifts or gifts that can be upgraded to unique for free are accepted
     * @param bool $premium_subscription True, if a Telegram Premium subscription is accepted
     * @param bool $gifts_from_channels  True, if transfers of unique gifts from channels are accepted
     */
    public function __construct(
        protected bool $unlimited_gifts,
        protected bool $limited_gifts,
        protected bool $unique_gifts,
        protected bool $premium_subscription,
        protected bool $gifts_from_channels,
    ) {}

    /**
     * @return bool
     */
    public function getUnlimitedGifts(): bool
    {
        return $this->unlimited_gifts;
    }

    /**
     * @param bool $unlimited_gifts
     *
     * @return AcceptedGiftTypes
     */
    public function setUnlimitedGifts(bool $unlimited_gifts): AcceptedGiftTypes
    {
        $this->unlimited_gifts = $unlimited_gifts;

        return $this;
    }

    /**
     * @return bool
     */
    public function getLimitedGifts(): bool
    {
        return $this->limited_gifts;
    }

    /**
     * @param bool $limited_gifts
     *
     * @return AcceptedGiftTypes
     */
    public function setLimitedGifts(bool $limited_gifts): AcceptedGiftTypes
    {
        $this->limited_gifts = $limited_gifts;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUniqueGifts(): bool
    {
        return $this->unique_gifts;
    }

    /**
     * @param bool $unique_gifts
     *
     * @return AcceptedGiftTypes
     */
    public function setUniqueGifts(bool $unique_gifts): AcceptedGiftTypes
    {
        $this->unique_gifts = $unique_gifts;

        return $this;
    }

    /**
     * @return bool
     */
    public function getPremiumSubscription(): bool
    {
        return $this->premium_subscription;
    }

    /**
     * @param bool $premium_subscription
     *
     * @return AcceptedGiftTypes
     */
    public function setPremiumSubscription(bool $premium_subscription): AcceptedGiftTypes
    {
        $this->premium_subscription = $premium_subscription;

        return $this;
    }

    /**
     * @return bool
     */
    public function getGiftsFromChannels(): bool
    {
        return $this->gifts_from_channels;
    }

    /**
     * @param bool $gifts_from_channels
     *
     * @return AcceptedGiftTypes
     */
    public function setGiftsFromChannels(bool $gifts_from_channels): AcceptedGiftTypes
    {
        $this->gifts_from_channels = $gifts_from_channels;

        return $this;
    }
}
// endregion CLASS_AcceptedGiftTypes
