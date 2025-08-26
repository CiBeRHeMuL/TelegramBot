<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object describes the backdrop of a unique gift.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftbackdrop
 */
final class UniqueGiftBackdrop implements EntityInterface
{
    /**
     * @param string $name Name of the backdrop
     * @param UniqueGiftBackdropColors $colors Colors of the backdrop
     * @param int $rarity_per_mille The number of unique gifts that receive this backdrop for every 1000 gifts upgraded
     *
     * @see https://core.telegram.org/bots/api#uniquegiftbackdropcolors UniqueGiftBackdropColors
     */
    public function __construct(
        protected string $name,
        protected UniqueGiftBackdropColors $colors,
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
     * @return UniqueGiftBackdrop
     */
    public function setName(string $name): UniqueGiftBackdrop
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return UniqueGiftBackdropColors
     */
    public function getColors(): UniqueGiftBackdropColors
    {
        return $this->colors;
    }

    /**
     * @param UniqueGiftBackdropColors $colors
     *
     * @return UniqueGiftBackdrop
     */
    public function setColors(UniqueGiftBackdropColors $colors): UniqueGiftBackdrop
    {
        $this->colors = $colors;
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
     * @return UniqueGiftBackdrop
     */
    public function setRarityPerMille(int $rarity_per_mille): UniqueGiftBackdrop
    {
        $this->rarity_per_mille = $rarity_per_mille;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'name' => $this->name,
            'colors' => $this->colors->toArray(),
            'rarity_per_mille' => $this->rarity_per_mille,
        ];
    }
}
