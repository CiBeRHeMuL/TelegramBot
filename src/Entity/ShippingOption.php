<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents one shipping option.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#shippingoption
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ShippingOption, Telegram, Bot API, DTO, shippingoption
// STRUCTURE: ▶ ┌id,title,prices: LabeledPrice[]┐ → ∑ ShippingOption
// region CLASS_ShippingOption

/**
 * This object represents one shipping option.
 *
 * @see https://core.telegram.org/bots/api#shippingoption
 */
final class ShippingOption implements EntityInterface
{
    /**
     * @param string         $id     Shipping option identifier
     * @param string         $title  Option title
     * @param LabeledPrice[] $prices List of price portions
     *
     * @see https://core.telegram.org/bots/api#labeledprice LabeledPrice
     */
    public function __construct(
        protected string $id,
        protected string $title,
        #[ArrayType(LabeledPrice::class)]
        protected array $prices,
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
     * @return ShippingOption
     */
    public function setId(string $id): ShippingOption
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return ShippingOption
     */
    public function setTitle(string $title): ShippingOption
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return LabeledPrice[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param LabeledPrice[] $prices
     *
     * @return ShippingOption
     */
    public function setPrices(array $prices): ShippingOption
    {
        $this->prices = $prices;

        return $this;
    }
}

// endregion CLASS_ShippingOption
