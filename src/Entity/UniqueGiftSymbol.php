<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object describes the symbol shown on the pattern of a unique gift.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftsymbol
 */
final class UniqueGiftSymbol implements EntityInterface
{
    /**
     * @param string $name Name of the symbol
     * @param Sticker $sticker The sticker that represents the unique gift
     * @param int $rarity_per_mille The number of unique gifts that receive this model for every 1000 gifts upgraded
     *
     * @see https://core.telegram.org/bots/api#sticker Sticker
     */
    public function __construct(
        protected string $name,
        protected Sticker $sticker,
        protected int $rarity_per_mille,
    ) {
    }

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
     * @return UniqueGiftSymbol
     */
    public function setName(string $name): UniqueGiftSymbol
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
     * @return UniqueGiftSymbol
     */
    public function setSticker(Sticker $sticker): UniqueGiftSymbol
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
     * @return UniqueGiftSymbol
     */
    public function setRarityPerMille(int $rarity_per_mille): UniqueGiftSymbol
    {
        $this->rarity_per_mille = $rarity_per_mille;
        return $this;
    }
}
