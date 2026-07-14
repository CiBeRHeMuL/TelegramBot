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
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockblockquotation
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockBlockQuotation, Telegram, Bot API, DTO, Input Rich Block Block Quotation
// STRUCTURE: ▶ ┌type,blocks,credit┐ → ∑ InputRichBlockBlockQuotation
// region CLASS_InputRichBlockBlockQuotation
/**
 * A block quotation, corresponding to the HTML tag <blockquote>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockblockquotation
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Blockquote->value))]
final class InputRichBlockBlockQuotation extends AbstractInputRichBlock
{
    /**
     * @param AbstractInputRichBlock[]           $blocks Content of the block
     * @param AbstractRichText|string|array|null $credit Optional. Credit of the block
     *
     * @see https://core.telegram.org/bots/api#inputrichblockRichBlock
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(AbstractInputRichBlock::class)]
        protected array $blocks,
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array|null $credit = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Blockquote);
    }

    /**
     * @return AbstractInputRichBlock[]
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }

    /**
     * @param AbstractInputRichBlock[] $blocks
     *
     * @return InputRichBlockBlockQuotation
     */
    public function setBlocks(array $blocks): InputRichBlockBlockQuotation
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
     * @return InputRichBlockBlockQuotation
     */
    public function setCredit(AbstractRichText|string|array|null $credit): InputRichBlockBlockQuotation
    {
        $this->credit = $credit;

        return $this;
    }
}

// endregion CLASS_InputRichBlockBlockQuotation
