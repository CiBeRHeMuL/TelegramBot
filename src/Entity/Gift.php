<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a gift that can be sent by the bot.
 *
 * @link https://core.telegram.org/bots/api#gift
 */
class Gift extends AbstractEntity
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
     *
     * @see https://core.telegram.org/bots/api#sticker Sticker
     */
    public function __construct(
        protected string $id,
        protected Sticker $sticker,
        protected int $star_count,
        protected int|null $remaining_count = null,
        protected int|null $total_count = null,
        protected int|null $upgrade_star_count = null,
    ) {
        parent::__construct();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Gift
    {
        $this->id = $id;
        return $this;
    }

    public function getSticker(): Sticker
    {
        return $this->sticker;
    }

    public function setSticker(Sticker $sticker): Gift
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getStarCount(): int
    {
        return $this->star_count;
    }

    public function setStarCount(int $star_count): Gift
    {
        $this->star_count = $star_count;
        return $this;
    }

    public function getRemainingCount(): int|null
    {
        return $this->remaining_count;
    }

    public function setRemainingCount(int|null $remaining_count): Gift
    {
        $this->remaining_count = $remaining_count;
        return $this;
    }

    public function getTotalCount(): int|null
    {
        return $this->total_count;
    }

    public function setTotalCount(int|null $total_count): Gift
    {
        $this->total_count = $total_count;
        return $this;
    }

    public function getUpgradeStarCount(): int|null
    {
        return $this->upgrade_star_count;
    }

    public function setUpgradeStarCount(int|null $upgrade_star_count): Gift
    {
        $this->upgrade_star_count = $upgrade_star_count;
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
        ];
    }
}
