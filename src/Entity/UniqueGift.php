<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object describes a unique gift that was upgraded from a regular gift.
 *
 * @link https://core.telegram.org/bots/api#uniquegift
 */
class UniqueGift extends AbstractEntity
{
    /**
     * @param string $base_name Human-readable name of the regular gift from which this unique gift was upgraded
     * @param string $name Unique name of the gift. This name can be used in https://t.me/nft/... links and story areas
     * @param int $number Unique number of the upgraded gift among gifts upgraded from the same regular gift
     * @param UniqueGiftModel $model Model of the gift
     * @param UniqueGiftSymbol $symbol Symbol of the gift
     * @param UniqueGiftBackdrop $backdrop Backdrop of the gift
     *
     * @see https://core.telegram.org/bots/api#uniquegiftmodel UniqueGiftModel
     * @see https://core.telegram.org/bots/api#uniquegiftsymbol UniqueGiftSymbol
     * @see https://core.telegram.org/bots/api#uniquegiftbackdrop UniqueGiftBackdrop
     */
    public function __construct(
        protected string $base_name,
        protected string $name,
        protected int $number,
        protected UniqueGiftModel $model,
        protected UniqueGiftSymbol $symbol,
        protected UniqueGiftBackdrop $backdrop,
    ) {
        parent::__construct();
    }

    public function getBaseName(): string
    {
        return $this->base_name;
    }

    public function setBaseName(string $base_name): UniqueGift
    {
        $this->base_name = $base_name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): UniqueGift
    {
        $this->name = $name;
        return $this;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): UniqueGift
    {
        $this->number = $number;
        return $this;
    }

    public function getModel(): UniqueGiftModel
    {
        return $this->model;
    }

    public function setModel(UniqueGiftModel $model): UniqueGift
    {
        $this->model = $model;
        return $this;
    }

    public function getSymbol(): UniqueGiftSymbol
    {
        return $this->symbol;
    }

    public function setSymbol(UniqueGiftSymbol $symbol): UniqueGift
    {
        $this->symbol = $symbol;
        return $this;
    }

    public function getBackdrop(): UniqueGiftBackdrop
    {
        return $this->backdrop;
    }

    public function setBackdrop(UniqueGiftBackdrop $backdrop): UniqueGift
    {
        $this->backdrop = $backdrop;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'base_name' => $this->base_name,
            'name' => $this->name,
            'number' => $this->number,
            'model' => $this->model->toArray(),
            'symbol' => $this->symbol->toArray(),
            'backdrop' => $this->backdrop->toArray(),
        ];
    }
}
