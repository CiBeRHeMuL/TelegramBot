<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object describes a unique gift that was upgraded from a regular gift.
 *
 * @link https://core.telegram.org/bots/api#uniquegift
 */
final class UniqueGift implements EntityInterface
{
    /**
     * @param string $base_name Human-readable name of the regular gift from which this unique gift was upgraded
     * @param string $name Unique name of the gift. This name can be used in https://t.me/nft/... links and story areas
     * @param int $number Unique number of the upgraded gift among gifts upgraded from the same regular gift
     * @param UniqueGiftModel $model Model of the gift
     * @param UniqueGiftSymbol $symbol Symbol of the gift
     * @param UniqueGiftBackdrop $backdrop Backdrop of the gift
     * @param Chat|null $publisher_chat Optional. Information about the chat that published the gift
     *
     * @see https://core.telegram.org/bots/api#uniquegiftmodel UniqueGiftModel
     * @see https://core.telegram.org/bots/api#uniquegiftsymbol UniqueGiftSymbol
     * @see https://core.telegram.org/bots/api#uniquegiftbackdrop UniqueGiftBackdrop
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected string $base_name,
        protected string $name,
        protected int $number,
        protected UniqueGiftModel $model,
        protected UniqueGiftSymbol $symbol,
        protected UniqueGiftBackdrop $backdrop,
        protected Chat|null $publisher_chat = null,
    ) {
    }

    /**
     * @return string
     */
    public function getBaseName(): string
    {
        return $this->base_name;
    }

    /**
     * @param string $base_name
     *
     * @return UniqueGift
     */
    public function setBaseName(string $base_name): UniqueGift
    {
        $this->base_name = $base_name;
        return $this;
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
     * @return UniqueGift
     */
    public function setName(string $name): UniqueGift
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     *
     * @return UniqueGift
     */
    public function setNumber(int $number): UniqueGift
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return UniqueGiftModel
     */
    public function getModel(): UniqueGiftModel
    {
        return $this->model;
    }

    /**
     * @param UniqueGiftModel $model
     *
     * @return UniqueGift
     */
    public function setModel(UniqueGiftModel $model): UniqueGift
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return UniqueGiftSymbol
     */
    public function getSymbol(): UniqueGiftSymbol
    {
        return $this->symbol;
    }

    /**
     * @param UniqueGiftSymbol $symbol
     *
     * @return UniqueGift
     */
    public function setSymbol(UniqueGiftSymbol $symbol): UniqueGift
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return UniqueGiftBackdrop
     */
    public function getBackdrop(): UniqueGiftBackdrop
    {
        return $this->backdrop;
    }

    /**
     * @param UniqueGiftBackdrop $backdrop
     *
     * @return UniqueGift
     */
    public function setBackdrop(UniqueGiftBackdrop $backdrop): UniqueGift
    {
        $this->backdrop = $backdrop;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getPublisherChat(): Chat|null
    {
        return $this->publisher_chat;
    }

    /**
     * @param Chat|null $publisher_chat
     *
     * @return UniqueGift
     */
    public function setPublisherChat(Chat|null $publisher_chat): UniqueGift
    {
        $this->publisher_chat = $publisher_chat;
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
            'publisher_chat' => $this->publisher_chat?->toArray(),
        ];
    }
}
