<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A block quotation, corresponding to the HTML tag <blockquote>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockblockquotation
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockBlockQuotation, Telegram, Bot API, DTO, Rich Block Block Quotation
// STRUCTURE: ▶ ┌type,blocks,credit┐ → ∑ RichBlockBlockQuotation
// region CLASS_RichBlockBlockQuotation
/**
 * A block quotation, corresponding to the HTML tag <blockquote>.
 *
 * @see https://core.telegram.org/bots/api#richblockblockquotation
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Blockquote->value))]
final class RichBlockBlockQuotation extends AbstractRichBlock
{
    /**
     * @param AbstractRichBlock[]                $blocks Content of the block
     * @param AbstractRichText|string|array|null $credit Optional. Credit of the block
     *
     * @see https://core.telegram.org/bots/api#richblock RichBlock
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(AbstractRichBlock::class)]
        protected array $blocks,
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array|null $credit = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Blockquote);
    }

    /**
     * @return AbstractRichBlock[]
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }

    /**
     * @param AbstractRichBlock[] $blocks
     *
     * @return RichBlockBlockQuotation
     */
    public function setBlocks(array $blocks): RichBlockBlockQuotation
    {
        $this->blocks = $blocks;

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
     * @return RichBlockBlockQuotation
     */
    public function setCredit(AbstractRichText|string|array|null $credit): RichBlockBlockQuotation
    {
        $this->credit = $credit;

        return $this;
    }
}

// endregion CLASS_RichBlockBlockQuotation
