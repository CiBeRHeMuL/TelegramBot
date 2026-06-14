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
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblocktable
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockTable, Telegram, Bot API, DTO, Rich Block Table
// STRUCTURE: ▶ ┌type,cells,is_bordered,is_striped,caption┐ → ∑ RichBlockTable
// region CLASS_RichBlockTable
/**
 * A table, corresponding to the HTML tag <table>.
 *
 * @see https://core.telegram.org/bots/api#richblocktable
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Table->value))]
final class RichBlockTable extends AbstractRichBlock
{
    /**
     * @param array[]                            $cells       Cells of the table
     * @param bool|null                          $is_bordered Optional. True, if the table has borders
     * @param bool|null                          $is_striped  Optional. True, if the table is striped
     * @param AbstractRichText|string|array|null $caption     Optional. Caption of the table
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
     * @return RichBlockTable
     */
    public function setCells(array $cells): RichBlockTable
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
     * @return RichBlockTable
     */
    public function setIsBordered(?bool $is_bordered): RichBlockTable
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
     * @return RichBlockTable
     */
    public function setIsStriped(?bool $is_striped): RichBlockTable
    {
        $this->is_striped = $is_striped;

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
     * @return RichBlockTable
     */
    public function setCaption(AbstractRichText|string|array|null $caption): RichBlockTable
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_RichBlockTable
