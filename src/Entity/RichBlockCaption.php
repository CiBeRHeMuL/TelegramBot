<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region CLASS_RichBlockCaption
/**
 * Caption of a rich formatted block.
 *
 * @see https://core.telegram.org/bots/api#richblockcaption
 */
final class RichBlockCaption implements EntityInterface
{
    /**
     * @param AbstractRichText|string|array      $text   Block caption
     * @param AbstractRichText|string|array|null $credit Optional. Block credit which corresponds to the HTML tag <cite>
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array|null $credit = null,
    ) {}

    /**
     * @return AbstractRichText|string|array
     */
    public function getText(): AbstractRichText|string|array
    {
        return $this->text;
    }

    /**
     * @param AbstractRichText|string|array $text
     *
     * @return RichBlockCaption
     */
    public function setText(AbstractRichText|string|array $text): RichBlockCaption
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return AbstractRichText|string|array|null
     */
    public function getCredit(): AbstractRichText|string|array|null
    {
        return $this->credit;
    }

    /**
     * @param AbstractRichText|string|array|null $credit
     *
     * @return RichBlockCaption
     */
    public function setCredit(AbstractRichText|string|array|null $credit): RichBlockCaption
    {
        $this->credit = $credit;

        return $this;
    }
}

// endregion CLASS_RichBlockCaption
