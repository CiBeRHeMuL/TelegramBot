<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represents one shipping option.
 * @link https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption extends AbstractEntity
{
    /**
     * @param string $id Shipping option identifier
     * @param string $title Option title
     * @param LabeledPrice[] $prices List of price portions
     */
    public function __construct(
        protected string $id,
        protected string $title,
        #[ArrayType(LabeledPrice::class)] protected array $prices,
    ) {
        parent::__construct();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ShippingOption
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): ShippingOption
    {
        $this->title = $title;
        return $this;
    }

    public function getPrices(): array
    {
        return $this->prices;
    }

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
