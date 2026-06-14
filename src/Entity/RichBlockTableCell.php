<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\RichBlockTableCellAlignEnum;
use AndrewGos\TelegramBot\Enum\RichBlockTableCellVerticalAlignEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Cell in a table.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblocktablecell
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockTableCell, Telegram, Bot API, DTO, Rich Block Table Cell
// STRUCTURE: ▶ ┌text,is_header,colspan,rowspan,align,valign┐ → ∑ RichBlockTableCell
// region CLASS_RichBlockTableCell
/**
 * Cell in a table.
 *
 * @see https://core.telegram.org/bots/api#richblocktablecell
 */
final class RichBlockTableCell implements EntityInterface
{
    /**
     * @param RichBlockTableCellAlignEnum         $align     Horizontal cell content alignment. Currently, must be one of \xe2\x80\x9cleft\xe2\x80\x9d, \xe2\x80\x9ccenter\xe2\x80\x9d, or \xe2\x80\x9cright\xe2\x80\x9d.
     * @param RichBlockTableCellVerticalAlignEnum $valign    Vertical cell content alignment. Currently, must be one of \xe2\x80\x9ctop\xe2\x80\x9d, \xe2\x80\x9cmiddle\xe2\x80\x9d, or \xe2\x80\x9cbottom\xe2\x80\x9d.
     * @param AbstractRichText|string|array|null  $text      Optional. Text in the cell. If omitted, then the cell is invisible.
     * @param bool|null                           $is_header Optional. True, if the cell is a header cell
     * @param int|null                            $colspan   Optional. The number of columns the cell spans if it is bigger than 1
     * @param int|null                            $rowspan   Optional. The number of rows the cell spans if it is bigger than 1
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        protected RichBlockTableCellAlignEnum $align,
        protected RichBlockTableCellVerticalAlignEnum $valign,
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array|null $text = null,
        protected ?bool $is_header = null,
        protected ?int $colspan = null,
        protected ?int $rowspan = null,
    ) {}

    /**
     * @return RichBlockTableCellAlignEnum
     */
    public function getAlign(): RichBlockTableCellAlignEnum
    {
        return $this->align;
    }

    /**
     * @param RichBlockTableCellAlignEnum $align
     *
     * @return RichBlockTableCell
     */
    public function setAlign(RichBlockTableCellAlignEnum $align): RichBlockTableCell
    {
        $this->align = $align;

        return $this;
    }

    /**
     * @return RichBlockTableCellVerticalAlignEnum
     */
    public function getValign(): RichBlockTableCellVerticalAlignEnum
    {
        return $this->valign;
    }

    /**
     * @param RichBlockTableCellVerticalAlignEnum $valign
     *
     * @return RichBlockTableCell
     */
    public function setValign(RichBlockTableCellVerticalAlignEnum $valign): RichBlockTableCell
    {
        $this->valign = $valign;

        return $this;
    }

    /**
     * @return AbstractRichText|string|array|null
     */
    public function getText(): AbstractRichText|string|array|null
    {
        return $this->text;
    }

    /**
     * @param AbstractRichText|string|array|null $text
     *
     * @return RichBlockTableCell
     */
    public function setText(AbstractRichText|string|array|null $text): RichBlockTableCell
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsHeader(): ?bool
    {
        return $this->is_header;
    }

    /**
     * @param bool|null $is_header
     *
     * @return RichBlockTableCell
     */
    public function setIsHeader(?bool $is_header): RichBlockTableCell
    {
        $this->is_header = $is_header;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getColspan(): ?int
    {
        return $this->colspan;
    }

    /**
     * @param int|null $colspan
     *
     * @return RichBlockTableCell
     */
    public function setColspan(?int $colspan): RichBlockTableCell
    {
        $this->colspan = $colspan;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRowspan(): ?int
    {
        return $this->rowspan;
    }

    /**
     * @param int|null $rowspan
     *
     * @return RichBlockTableCell
     */
    public function setRowspan(?int $rowspan): RichBlockTableCell
    {
        $this->rowspan = $rowspan;

        return $this;
    }
}

// endregion CLASS_RichBlockTableCell
