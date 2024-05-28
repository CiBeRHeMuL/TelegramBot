<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;

/**
 * This object represents one shipping option.
 * @link https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption implements EntityInterface
{
    /**
     * @param string $id Shipping option identifier
     * @param string $title Option title
     * @param LabeledPrice[] $prices List of price portions
     */
    public function __construct(
        private string $id,
        private string $title,
        #[ArrayType(LabeledPrice::class)] private array $prices,
    ) {
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

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'prices' => array_map(fn(LabeledPrice $e) => $e->toArray(), $this->prices),
        ];
    }
}
