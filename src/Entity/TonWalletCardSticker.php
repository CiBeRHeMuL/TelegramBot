<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_TonWalletCardSticker
/**
 * This object describes a sticker on a TON wallet card.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#tonwalletcardsticker
 */
final class TonWalletCardSticker implements EntityInterface
{
    /**
     * @param AreaPosition $position Position of the sticker on the card
     * @param TonNft       $nft      The NFT shown as the sticker
     *
     * @see https://core.telegram.org/bots/api#areaposition AreaPosition
     * @see https://core.telegram.org/bots/api#tonnft TonNft
     */
    public function __construct(
        protected AreaPosition $position,
        protected TonNft $nft,
    ) {}

    /**
     * @return AreaPosition
     */
    public function getPosition(): AreaPosition
    {
        return $this->position;
    }

    /**
     * @param AreaPosition $position
     *
     * @return TonWalletCardSticker
     */
    public function setPosition(AreaPosition $position): TonWalletCardSticker
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return TonNft
     */
    public function getNft(): TonNft
    {
        return $this->nft;
    }

    /**
     * @param TonNft $nft
     *
     * @return TonWalletCardSticker
     */
    public function setNft(TonNft $nft): TonWalletCardSticker
    {
        $this->nft = $nft;

        return $this;
    }
}
// endregion CLASS_TonWalletCardSticker
