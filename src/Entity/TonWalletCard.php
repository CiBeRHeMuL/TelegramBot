<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region CLASS_TonWalletCard
/**
 * This object describes a TON wallet card, which is shown on the profile page of a user to everyone.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#tonwalletcard
 */
final class TonWalletCard implements EntityInterface
{
    /**
     * @param string                 $address                Address of the wallet
     * @param string                 $amount                 Balance of the wallet, in the smallest units of the cryptocurrency, as a decimal number
     * @param TonWalletCardSticker[] $stickers               Stickers placed on the card
     * @param string|null            $background_nft_address Optional. Address of the NFT of one of the stickers, whose colors must be used
     *                                                       for the card background; omitted if the default background must be used
     *
     * @see https://core.telegram.org/bots/api#tonwalletcardsticker TonWalletCardSticker
     */
    public function __construct(
        protected string $address,
        protected string $amount,
        #[ArrayType(TonWalletCardSticker::class)]
        protected array $stickers,
        protected ?string $background_nft_address = null,
    ) {}

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return TonWalletCard
     */
    public function setAddress(string $address): TonWalletCard
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     *
     * @return TonWalletCard
     */
    public function setAmount(string $amount): TonWalletCard
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return TonWalletCardSticker[]
     */
    public function getStickers(): array
    {
        return $this->stickers;
    }

    /**
     * @param TonWalletCardSticker[] $stickers
     *
     * @return TonWalletCard
     */
    public function setStickers(array $stickers): TonWalletCard
    {
        $this->stickers = $stickers;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBackgroundNftAddress(): ?string
    {
        return $this->background_nft_address;
    }

    /**
     * @param string|null $background_nft_address
     *
     * @return TonWalletCard
     */
    public function setBackgroundNftAddress(?string $background_nft_address): TonWalletCard
    {
        $this->background_nft_address = $background_nft_address;

        return $this;
    }
}
// endregion CLASS_TonWalletCard
