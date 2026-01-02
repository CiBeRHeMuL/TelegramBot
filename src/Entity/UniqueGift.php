<?php

namespace AndrewGos\TelegramBot\Entity;

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
     * @param string $gift_id Identifier of the regular gift from which the gift was upgraded
     * @param Chat|null $publisher_chat Optional. Information about the chat that published the gift
     * @param bool|null $is_premium Optional. True, if the original regular gift was exclusively purchaseable by Telegram Premium
     * subscribers
     * @param bool|null $is_from_blockchain Optional. True, if the gift is assigned from the TON blockchain and can't be resold or
     * transferred in Telegram
     * @param UniqueGiftColors|null $colors Optional. The color scheme that can be used by the gift's owner for the chat's name,
     * replies to messages and link previews; for business account gifts and gifts that are currently on sale only
     *
     * @see https://core.telegram.org/bots/api#uniquegiftmodel UniqueGiftModel
     * @see https://core.telegram.org/bots/api#uniquegiftsymbol UniqueGiftSymbol
     * @see https://core.telegram.org/bots/api#uniquegiftbackdrop UniqueGiftBackdrop
     * @see https://core.telegram.org/bots/api#uniquegiftcolors UniqueGiftColors
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected string $base_name,
        protected string $name,
        protected int $number,
        protected UniqueGiftModel $model,
        protected UniqueGiftSymbol $symbol,
        protected UniqueGiftBackdrop $backdrop,
        protected string $gift_id,
        protected ?Chat $publisher_chat = null,
        protected ?bool $is_premium = null,
        protected ?bool $is_from_blockchain = null,
        protected ?UniqueGiftColors $colors = null,
    ) {}

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
     * @return string
     */
    public function getGiftId(): string
    {
        return $this->gift_id;
    }

    /**
     * @param string $gift_id
     *
     * @return UniqueGift
     */
    public function setGiftId(string $gift_id): UniqueGift
    {
        $this->gift_id = $gift_id;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getPublisherChat(): ?Chat
    {
        return $this->publisher_chat;
    }

    /**
     * @param Chat|null $publisher_chat
     *
     * @return UniqueGift
     */
    public function setPublisherChat(?Chat $publisher_chat): UniqueGift
    {
        $this->publisher_chat = $publisher_chat;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsPremium(): ?bool
    {
        return $this->is_premium;
    }

    /**
     * @param bool|null $is_premium
     *
     * @return UniqueGift
     */
    public function setIsPremium(?bool $is_premium): UniqueGift
    {
        $this->is_premium = $is_premium;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsFromBlockchain(): ?bool
    {
        return $this->is_from_blockchain;
    }

    /**
     * @param bool|null $is_from_blockchain
     *
     * @return UniqueGift
     */
    public function setIsFromBlockchain(?bool $is_from_blockchain): UniqueGift
    {
        $this->is_from_blockchain = $is_from_blockchain;
        return $this;
    }

    /**
     * @return UniqueGiftColors|null
     */
    public function getColors(): ?UniqueGiftColors
    {
        return $this->colors;
    }

    /**
     * @param UniqueGiftColors|null $colors
     *
     * @return UniqueGift
     */
    public function setColors(?UniqueGiftColors $colors): UniqueGift
    {
        $this->colors = $colors;
        return $this;
    }
}
