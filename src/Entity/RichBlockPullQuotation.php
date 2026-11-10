<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_RichBlockPullQuotation
/**
 * A quotation with centered text, loosely corresponding to the HTML tag <aside>.
 *
 * @see https://core.telegram.org/bots/api#richblockpullquotation
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Pullquote->value))]
final class RichBlockPullQuotation extends AbstractRichBlock
{
    /**
     * @param AbstractRichText|string|array      $text   Text of the block
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
        parent::__construct(RichBlockTypeEnum::Pullquote);
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
     * @return RichBlockPullQuotation
     */
    public function setText(AbstractRichText|string|array $text): RichBlockPullQuotation
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
     * @return RichBlockPullQuotation
     */
    public function setCredit(AbstractRichText|string|array|null $credit): RichBlockPullQuotation
    {
        $this->credit = $credit;

        return $this;
    }
}

// endregion CLASS_RichBlockPullQuotation
