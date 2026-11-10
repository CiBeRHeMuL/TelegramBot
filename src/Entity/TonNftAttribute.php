<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_TonNftAttribute
/**
 * This object represents an attribute of an NFT in the TON blockchain.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#tonnftattribute
 */
final class TonNftAttribute implements EntityInterface
{
    /**
     * @param string $trait_type Trait type of the attribute
     * @param string $value      Value of the attribute
     */
    public function __construct(
        protected string $trait_type,
        protected string $value,
    ) {}

    /**
     * @return string
     */
    public function getTraitType(): string
    {
        return $this->trait_type;
    }

    /**
     * @param string $trait_type
     *
     * @return TonNftAttribute
     */
    public function setTraitType(string $trait_type): TonNftAttribute
    {
        $this->trait_type = $trait_type;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return TonNftAttribute
     */
    public function setValue(string $value): TonNftAttribute
    {
        $this->value = $value;

        return $this;
    }
}
// endregion CLASS_TonNftAttribute
