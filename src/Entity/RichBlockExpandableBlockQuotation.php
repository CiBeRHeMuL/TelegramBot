<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_RichBlockExpandableBlockQuotation
/**
 * A block quotation, corresponding to the HTML tag <blockquote> with custom attribute "collapsed".
 *
 * @see https://core.telegram.org/bots/api#richblockexpandableblockquotation
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::ExpandableBlockquote->value))]
final class RichBlockExpandableBlockQuotation extends AbstractRichBlock
{
    /**
     * @param AbstractRichText|string|array      $text   Content of the block
     * @param AbstractRichText|string|array|null $credit Optional. Credit of the block
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array|null $credit = null,
    ) {
        parent::__construct(RichBlockTypeEnum::ExpandableBlockquote);
    }

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
     * @return RichBlockExpandableBlockQuotation
     */
    public function setText(AbstractRichText|string|array $text): RichBlockExpandableBlockQuotation
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
     * @return RichBlockExpandableBlockQuotation
     */
    public function setCredit(AbstractRichText|string|array|null $credit): RichBlockExpandableBlockQuotation
    {
        $this->credit = $credit;

        return $this;
    }
}

// endregion CLASS_RichBlockExpandableBlockQuotation
