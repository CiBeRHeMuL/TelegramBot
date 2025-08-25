<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represents one shipping option.
 *
 * @link https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption extends AbstractEntity
{
    /**
     * @param string $id Shipping option identifier
     * @param string $title Option title
     * @param LabeledPrice[] $prices List of price portions
     *
     * @see https://core.telegram.org/bots/api#labeledprice LabeledPrice
     */
    public function __construct(
        protected string $id,
        protected string $title,
        #[ArrayType(LabeledPrice::class)]
        protected array $prices,
    ) {
        parent::__construct();
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

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'prices' => array_map(fn(LabeledPrice $e) => $e->toArray(), $this->prices),
        ];
    }
}
