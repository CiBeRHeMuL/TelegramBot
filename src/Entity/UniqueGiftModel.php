<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\UniqueGistModelRarityEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents the model of a unique gift.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#uniquegiftmodel
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UniqueGiftModel, Telegram, Bot API, DTO, uniquegiftmodel
// STRUCTURE: ▶ ┌name,rarity_per_mille,sticker┐ → ∑ model
// region CLASS_UniqueGiftModel

/**
 * This object describes the model of a unique gift.
 *
 * @see https://core.telegram.org/bots/api#uniquegiftmodel
 */
final class UniqueGiftModel implements EntityInterface
{
    /**
     * @param string                         $name             Name of the model
     * @param Sticker                        $sticker          The sticker that represents the unique gift
     * @param int                            $rarity_per_mille The number of unique gifts that receive this model for every 1000 gift upgrades. Always 0 for
     *                                                         crafted gifts.
     * @param UniqueGistModelRarityEnum|null $rarity           Optional. Rarity of the model if it is a crafted model. Currently, can be “uncommon”,
     *                                                         “rare”, “epic”, or “legendary”.
     *
     * @see https://core.telegram.org/bots/api#sticker Sticker
     */
    public function __construct(
        protected string $name,
        protected Sticker $sticker,
        protected int $rarity_per_mille,
        protected ?UniqueGistModelRarityEnum $rarity = null,
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

    /**
     * @return UniqueGistModelRarityEnum|null
     */
    public function getRarity(): ?UniqueGistModelRarityEnum
    {
        return $this->rarity;
    }

    /**
     * @param UniqueGistModelRarityEnum|null $rarity
     *
     * @return UniqueGiftModel
     */
    public function setRarity(?UniqueGistModelRarityEnum $rarity): UniqueGiftModel
    {
        $this->rarity = $rarity;

        return $this;
    }
}

// endregion CLASS_UniqueGiftModel
