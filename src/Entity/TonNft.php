<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region CLASS_TonNft
/**
 * This object represents an NFT in the TON blockchain.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#tonnft
 */
final class TonNft implements EntityInterface
{
    /**
     * @param string                 $address            Address of the NFT
     * @param string                 $index              Index of the NFT among all NFTs from the collection as a decimal number
     * @param string                 $name               Name of the NFT
     * @param string                 $description        Description of the NFT
     * @param TonNftAttribute[]|null $attributes         Optional. Attributes of the NFT
     * @param string|null            $collection_address Optional. Address of the collection to which the NFT belongs; omitted if unknown
     * @param UniqueGift|null        $gift               Optional. The unique gift corresponding to the NFT
     *
     * @see https://core.telegram.org/bots/api#tonnftattribute TonNftAttribute
     * @see https://core.telegram.org/bots/api#uniquegift UniqueGift
     */
    public function __construct(
        protected string $address,
        protected string $index,
        protected string $name,
        protected string $description,
        #[ArrayType(TonNftAttribute::class)]
        protected ?array $attributes = null,
        protected ?string $collection_address = null,
        protected ?UniqueGift $gift = null,
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
     * @return TonNft
     */
    public function setAddress(string $address): TonNft
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * @param string $index
     *
     * @return TonNft
     */
    public function setIndex(string $index): TonNft
    {
        $this->index = $index;

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
     * @return TonNft
     */
    public function setName(string $name): TonNft
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return TonNft
     */
    public function setDescription(string $description): TonNft
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return TonNftAttribute[]|null
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @param TonNftAttribute[]|null $attributes
     *
     * @return TonNft
     */
    public function setAttributes(?array $attributes): TonNft
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCollectionAddress(): ?string
    {
        return $this->collection_address;
    }

    /**
     * @param string|null $collection_address
     *
     * @return TonNft
     */
    public function setCollectionAddress(?string $collection_address): TonNft
    {
        $this->collection_address = $collection_address;

        return $this;
    }

    /**
     * @return UniqueGift|null
     */
    public function getGift(): ?UniqueGift
    {
        return $this->gift;
    }

    /**
     * @param UniqueGift|null $gift
     *
     * @return TonNft
     */
    public function setGift(?UniqueGift $gift): TonNft
    {
        $this->gift = $gift;

        return $this;
    }
}
// endregion CLASS_TonNft
