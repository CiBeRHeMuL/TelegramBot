<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

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
     * @param int|null $remaining_count Optional. The number of remaining gifts of this type that can be sent; for limited gifts
     * only
     * @param int|null $total_count Optional. The total number of the gifts of this type that can be sent; for limited gifts only
     * @param int|null $upgrade_star_count Optional. The number of Telegram Stars that must be paid to upgrade the gift to a unique
     * one
     * @param Chat|null $publisher_chat Optional. Information about the chat that published the gift
     *
     * @see https://core.telegram.org/bots/api#sticker Sticker
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected string $id,
        protected Sticker $sticker,
        protected int $star_count,
        protected int|null $remaining_count = null,
        protected int|null $total_count = null,
        protected int|null $upgrade_star_count = null,
        protected Chat|null $publisher_chat = null,
    ) {
    }

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
    public function getRemainingCount(): int|null
    {
        return $this->remaining_count;
    }

    /**
     * @param int|null $remaining_count
     *
     * @return Gift
     */
    public function setRemainingCount(int|null $remaining_count): Gift
    {
        $this->remaining_count = $remaining_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalCount(): int|null
    {
        return $this->total_count;
    }

    /**
     * @param int|null $total_count
     *
     * @return Gift
     */
    public function setTotalCount(int|null $total_count): Gift
    {
        $this->total_count = $total_count;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUpgradeStarCount(): int|null
    {
        return $this->upgrade_star_count;
    }

    /**
     * @param int|null $upgrade_star_count
     *
     * @return Gift
     */
    public function setUpgradeStarCount(int|null $upgrade_star_count): Gift
    {
        $this->upgrade_star_count = $upgrade_star_count;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getPublisherChat(): Chat|null
    {
        return $this->publisher_chat;
    }

    /**
     * @param Chat|null $publisher_chat
     *
     * @return Gift
     */
    public function setPublisherChat(Chat|null $publisher_chat): Gift
    {
        $this->publisher_chat = $publisher_chat;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'sticker' => $this->sticker->toArray(),
            'star_count' => $this->star_count,
            'remaining_count' => $this->remaining_count,
            'total_count' => $this->total_count,
            'upgrade_star_count' => $this->upgrade_star_count,
            'publisher_chat' => $this->publisher_chat?->toArray(),
        ];
    }
}
