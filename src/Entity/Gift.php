<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a gift that can be sent by the bot.
 *
 * @link https://core.telegram.org/bots/api#gift
 */
final class Gift implements EntityInterface
{
    /**
     * @param string $id Unique identifier of the gift
     * @param Sticker $sticker The sticker that represents the gift
     * @param int $star_count The number of Telegram Stars that must be paid to send the sticker
     * @param int|null $remaining_count Optional. The number of remaining gifts of this type that can be sent by all users; for limited
     * gifts only
     * @param int|null $total_count Optional. The total number of gifts of this type that can be sent by all users; for limited gifts
     * only
     * @param int|null $upgrade_star_count Optional. The number of Telegram Stars that must be paid to upgrade the gift to a unique
     * one
     * @param Chat|null $publisher_chat Optional. Information about the chat that published the gift
     * @param bool|null $is_premium Optional. True, if the gift can only be purchased by Telegram Premium subscribers
     * @param bool|null $has_colors Optional. True, if the gift can be used (after being upgraded) to customize a user's appearance
     * @param int|null $personal_total_count Optional. The total number of gifts of this type that can be sent by the bot; for limited
     * gifts only
     * @param int|null $personal_remaining_count Optional. The number of remaining gifts of this type that can be sent by the bot;
     * for limited gifts only
     * @param GiftBackground|null $background Optional. Background of the gift
     * @param int|null $unique_gift_variant_count Optional. The total number of different unique gifts that can be obtained by upgrading
     * the gift
     *
     * @see https://core.telegram.org/bots/api#sticker Sticker
     * @see https://core.telegram.org/bots/api#giftbackground GiftBackground
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected string $id,
        protected Sticker $sticker,
        protected int $star_count,
        protected ?int $remaining_count = null,
        protected ?int $total_count = null,
        protected ?int $upgrade_star_count = null,
        protected ?Chat $publisher_chat = null,
        protected ?bool $is_premium = null,
        protected ?bool $has_colors = null,
        protected ?int $personal_total_count = null,
        protected ?int $personal_remaining_count = null,
        protected ?GiftBackground $background = null,
        protected ?int $unique_gift_variant_count = null,
    ) {}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Gift
     */
    public function setId(string $id): Gift
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Sticker
     */
    public function getSticker(): Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Sticker $sticker
     *
     * @return Gift
     */
    public function setSticker(Sticker $sticker): Gift
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * @return int
     */
    public function getStarCount(): int
    {
        return $this->star_count;
    }

    /**
     * @param int $star_count
     *
     * @return Gift
     */
    public function setStarCount(int $star_count): Gift
    {
        $this->star_count = $star_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRemainingCount(): ?int
    {
        return $this->remaining_count;
    }

    /**
     * @param int|null $remaining_count
     *
     * @return Gift
     */
    public function setRemainingCount(?int $remaining_count): Gift
    {
        $this->remaining_count = $remaining_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalCount(): ?int
    {
        return $this->total_count;
    }

    /**
     * @param int|null $total_count
     *
     * @return Gift
     */
    public function setTotalCount(?int $total_count): Gift
    {
        $this->total_count = $total_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUpgradeStarCount(): ?int
    {
        return $this->upgrade_star_count;
    }

    /**
     * @param int|null $upgrade_star_count
     *
     * @return Gift
     */
    public function setUpgradeStarCount(?int $upgrade_star_count): Gift
    {
        $this->upgrade_star_count = $upgrade_star_count;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getPublisherChat(): ?Chat
    {
        return $this->publisher_chat;
    }

    /**
     * @param Chat|null $publisher_chat
     *
     * @return Gift
     */
    public function setPublisherChat(?Chat $publisher_chat): Gift
    {
        $this->publisher_chat = $publisher_chat;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsPremium(): ?bool
    {
        return $this->is_premium;
    }

    /**
     * @param bool|null $is_premium
     *
     * @return Gift
     */
    public function setIsPremium(?bool $is_premium): Gift
    {
        $this->is_premium = $is_premium;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasColors(): ?bool
    {
        return $this->has_colors;
    }

    /**
     * @param bool|null $has_colors
     *
     * @return Gift
     */
    public function setHasColors(?bool $has_colors): Gift
    {
        $this->has_colors = $has_colors;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPersonalTotalCount(): ?int
    {
        return $this->personal_total_count;
    }

    /**
     * @param int|null $personal_total_count
     *
     * @return Gift
     */
    public function setPersonalTotalCount(?int $personal_total_count): Gift
    {
        $this->personal_total_count = $personal_total_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPersonalRemainingCount(): ?int
    {
        return $this->personal_remaining_count;
    }

    /**
     * @param int|null $personal_remaining_count
     *
     * @return Gift
     */
    public function setPersonalRemainingCount(?int $personal_remaining_count): Gift
    {
        $this->personal_remaining_count = $personal_remaining_count;
        return $this;
    }

    /**
     * @return GiftBackground|null
     */
    public function getBackground(): ?GiftBackground
    {
        return $this->background;
    }

    /**
     * @param GiftBackground|null $background
     *
     * @return Gift
     */
    public function setBackground(?GiftBackground $background): Gift
    {
        $this->background = $background;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUniqueGiftVariantCount(): ?int
    {
        return $this->unique_gift_variant_count;
    }

    /**
     * @param int|null $unique_gift_variant_count
     *
     * @return Gift
     */
    public function setUniqueGiftVariantCount(?int $unique_gift_variant_count): Gift
    {
        $this->unique_gift_variant_count = $unique_gift_variant_count;
        return $this;
    }
}
