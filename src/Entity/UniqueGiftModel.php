<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object describes the model of a unique gift.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftmodel
 */
class UniqueGiftModel extends AbstractEntity
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
    ) {
        parent::__construct();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): UniqueGiftModel
    {
        $this->name = $name;
        return $this;
    }

    public function getSticker(): Sticker
    {
        return $this->sticker;
    }

    public function setSticker(Sticker $sticker): UniqueGiftModel
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getRarityPerMille(): int
    {
        return $this->rarity_per_mille;
    }

    public function setRarityPerMille(int $rarity_per_mille): UniqueGiftModel
    {
        $this->rarity_per_mille = $rarity_per_mille;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'name' => $this->name,
            'sticker' => $this->sticker->toArray(),
            'rarity_per_mille' => $this->rarity_per_mille,
        ];
    }
}
