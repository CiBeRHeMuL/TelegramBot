<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region CLASS_RichTextTonAddress
/**
 * An address in the TON blockchain.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#richtexttonaddress
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::TonAddress->value))]
final class RichTextTonAddress extends AbstractRichText
{
    /**
     * @param AbstractRichText $text    Text of the address
     * @param string           $address The address
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        protected AbstractRichText $text,
        protected string $address,
    ) {
        parent::__construct(
            RichTextTypeEnum::TonAddress,
        );
    }

    /**
     * @return AbstractRichText
     */
    public function getText(): AbstractRichText
    {
        return $this->text;
    }

    /**
     * @param AbstractRichText $text
     *
     * @return RichTextTonAddress
     */
    public function setText(AbstractRichText $text): RichTextTonAddress
    {
        $this->text = $text;

        return $this;
    }

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
     * @return RichTextTonAddress
     */
    public function setAddress(string $address): RichTextTonAddress
    {
        $this->address = $address;

        return $this;
    }
}
// endregion CLASS_RichTextTonAddress
