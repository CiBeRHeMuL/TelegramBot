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
 * @purpose A table, corresponding to the HTML tag <table>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblocktable
 *
 * @changes LAST_CHANGE: Updated for Bot API 10.3 - added is_compact
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockTable, Telegram, Bot API, DTO, Input Rich Block Table
// STRUCTURE: ▶ ┌type,cells,is_bordered,is_striped,is_compact,caption┐ → ∑ InputRichBlockTable
// region CLASS_InputRichBlockTable
/**
 * A table, corresponding to the HTML tag <table>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblocktable
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Table->value))]
final class InputRichBlockTable extends AbstractInputRichBlock
{
    /**
     * @param array[]                            $cells       Cells of the table
     * @param bool|null                          $is_bordered Optional. Pass True if the table has borders
     * @param bool|null                          $is_striped  Optional. Pass True if the table is striped
     * @param AbstractRichText|string|array|null $caption     Optional. Caption of the table
     * @param bool|null                          $is_compact  Optional. Pass True if table cells must have smaller indents
     *
     * @see https://core.telegram.org/bots/api#richblocktablecell RichBlockTableCell
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(new ArrayType(RichBlockTableCell::class))]
        protected array $cells,
        protected ?bool $is_bordered = null,
        protected ?bool $is_striped = null,
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array|null $caption = null,
        protected ?bool $is_compact = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Table);
    }

    /**
     * @return array
     */
    public function getCells(): array
    {
        return $this->cells;
    }

    /**
     * @param array $cells
     *
     * @return InputRichBlockTable
     */
    public function setCells(array $cells): InputRichBlockTable
    {
        $this->cells = $cells;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsBordered(): ?bool
    {
        return $this->is_bordered;
    }

    /**
     * @param bool|null $is_bordered
     *
     * @return InputRichBlockTable
     */
    public function setIsBordered(?bool $is_bordered): InputRichBlockTable
    {
        $this->is_bordered = $is_bordered;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsStriped(): ?bool
    {
        return $this->is_striped;
    }

    /**
     * @param bool|null $is_striped
     *
     * @return InputRichBlockTable
     */
    public function setIsStriped(?bool $is_striped): InputRichBlockTable
    {
        $this->is_striped = $is_striped;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsCompact(): ?bool
    {
        return $this->is_compact;
    }

    /**
     * @param bool|null $is_compact
     *
     * @return InputRichBlockTable
     */
    public function setIsCompact(?bool $is_compact): InputRichBlockTable
    {
        $this->is_compact = $is_compact;

        return $this;
    }

    /**
     * @return AbstractRichText|string|array|null
     */
    public function getCaption(): AbstractRichText|string|array|null
    {
        return $this->caption;
    }

    /**
     * @param AbstractRichText|string|array|null $caption
     *
     * @return InputRichBlockTable
     */
    public function setCaption(AbstractRichText|string|array|null $caption): InputRichBlockTable
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_InputRichBlockTable
