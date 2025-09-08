<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object describes the model of a unique gift.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftmodel
 */
final class UniqueGiftModel implements EntityInterface
{
    /**
     * @param string $name Name of the model
     * @param Sticker $sticker The sticker that represents the unique gift
     * @param int $rarity_per_mille The number of unique gifts that receive this model for every 1000 gifts upgraded
     *
     * @see https://core.telegram.org/bots/api#sticker Sticker
     */
    public function __construct(
        protected string $name,
        protected Sticker $sticker,
        protected int $rarity_per_mille,
    ) {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return UniqueGiftModel
     */
    public function setName(string $name): UniqueGiftModel
    {
        $this->name = $name;
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
     * @return UniqueGiftModel
     */
    public function setSticker(Sticker $sticker): UniqueGiftModel
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * @return int
     */
    public function getRarityPerMille(): int
    {
        return $this->rarity_per_mille;
    }

    /**
     * @param int $rarity_per_mille
     *
     * @return UniqueGiftModel
     */
    public function setRarityPerMille(int $rarity_per_mille): UniqueGiftModel
    {
        $this->rarity_per_mille = $rarity_per_mille;
        return $this;
    }
}
