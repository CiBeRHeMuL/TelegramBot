<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\RichBlockListItemTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose An item of a list used as input.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblocklistitem
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockListItem, Telegram, Bot API, DTO, Input Rich Block List Item
// STRUCTURE: ▶ ┌type,blocks,has_checkbox,is_checked,value┐ → ∑ InputRichBlockListItem
// region CLASS_InputRichBlockListItem
/**
 * An item of a list.
 *
 * @see https://core.telegram.org/bots/api#inputrichblocklistitem
 */
final class InputRichBlockListItem implements EntityInterface
{
    /**
     * @param AbstractInputRichBlock[]       $blocks       The content of the item
     * @param bool|null                      $has_checkbox Optional. True, if the item has a checkbox
     * @param bool|null                      $is_checked   Optional. True, if the item has a checked checkbox
     * @param int|null                       $value        Optional. For ordered lists, the numeric value of the item label
     * @param RichBlockListItemTypeEnum|null $type         Optional. For ordered lists, the type of the item label; must be one of "a" for lowercase letters, "A" for uppercase letters, "i" for lowercase Roman numerals, "I" for uppercase Roman numerals, or "1" for decimal numbers
     *
     * @see https://core.telegram.org/bots/api#inputrichblock InputRichBlock
     */
    public function __construct(
        #[ArrayType(AbstractInputRichBlock::class)]
        protected array $blocks,
        protected ?bool $has_checkbox = null,
        protected ?bool $is_checked = null,
        protected ?int $value = null,
        protected ?RichBlockListItemTypeEnum $type = null,
    ) {}

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
     * @return InputRichBlockListItem
     */
    public function setBlocks(array $blocks): InputRichBlockListItem
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
     * @return InputRichBlockListItem
     */
    public function setHasCheckbox(?bool $has_checkbox): InputRichBlockListItem
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
     * @return InputRichBlockListItem
     */
    public function setIsChecked(?bool $is_checked): InputRichBlockListItem
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
     * @return InputRichBlockListItem
     */
    public function setValue(?int $value): InputRichBlockListItem
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
     * @return InputRichBlockListItem
     */
    public function setType(?RichBlockListItemTypeEnum $type): InputRichBlockListItem
    {
        $this->type = $type;

        return $this;
    }
}

// endregion CLASS_InputRichBlockListItem
