<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\RichBlockListItemTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose An item of a list.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblocklistitem
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockListItem, Telegram, Bot API, DTO, Rich Block List Item
// STRUCTURE: ▶ ┌type,label,blocks,has_checkbox,is_checked,value┐ → ∑ RichBlockListItem
// region CLASS_RichBlockListItem
/**
 * An item of a list.
 *
 * @see https://core.telegram.org/bots/api#richblocklistitem
 */
final class RichBlockListItem implements EntityInterface
{
    /**
     * @param string                         $label        Label of the item
     * @param AbstractRichBlock[]            $blocks       The content of the item
     * @param bool|null                      $has_checkbox Optional. True, if the item has a checkbox
     * @param bool|null                      $is_checked   Optional. True, if the item has a checked checkbox
     * @param int|null                       $value        Optional. For ordered lists, the numeric value of the item label
     * @param RichBlockListItemTypeEnum|null $type         Optional. For ordered lists, the type of the item label; must be one of “a” for lowercase letters, “A” for uppercase letters, “i” for lowercase Roman numerals, “I” for uppercase Roman numerals, or “1” for decimal numbers
     *
     * @see https://core.telegram.org/bots/api#richblock RichBlock
     */
    public function __construct(
        protected string $label,
        #[ArrayType(AbstractRichBlock::class)]
        protected array $blocks,
        protected ?bool $has_checkbox = null,
        protected ?bool $is_checked = null,
        protected ?int $value = null,
        protected ?RichBlockListItemTypeEnum $type = null,
    ) {}

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return RichBlockListItem
     */
    public function setLabel(string $label): RichBlockListItem
    {
        $this->label = $label;

        return $this;
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
     * @return RichBlockListItem
     */
    public function setBlocks(array $blocks): RichBlockListItem
    {
        $this->blocks = $blocks;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasCheckbox(): ?bool
    {
        return $this->has_checkbox;
    }

    /**
     * @param bool|null $has_checkbox
     *
     * @return RichBlockListItem
     */
    public function setHasCheckbox(?bool $has_checkbox): RichBlockListItem
    {
        $this->has_checkbox = $has_checkbox;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsChecked(): ?bool
    {
        return $this->is_checked;
    }

    /**
     * @param bool|null $is_checked
     *
     * @return RichBlockListItem
     */
    public function setIsChecked(?bool $is_checked): RichBlockListItem
    {
        $this->is_checked = $is_checked;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @param int|null $value
     *
     * @return RichBlockListItem
     */
    public function setValue(?int $value): RichBlockListItem
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return RichBlockListItemTypeEnum|null
     */
    public function getType(): ?RichBlockListItemTypeEnum
    {
        return $this->type;
    }

    /**
     * @param RichBlockListItemTypeEnum|null $type
     *
     * @return RichBlockListItem
     */
    public function setType(?RichBlockListItemTypeEnum $type): RichBlockListItem
    {
        $this->type = $type;

        return $this;
    }
}

// endregion CLASS_RichBlockListItem
