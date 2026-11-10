<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_RichBlockList
/**
 * A list of blocks, corresponding to the HTML tag <ul> or <ol> with multiple nested tags <li>.
 *
 * @see https://core.telegram.org/bots/api#richblocklist
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::List->value))]
final class RichBlockList extends AbstractRichBlock
{
    /**
     * @param RichBlockListItem[] $items Items of the list
     *
     * @see https://core.telegram.org/bots/api#richblocklistitem RichBlockListItem
     */
    public function __construct(
        #[ArrayType(RichBlockListItem::class)]
        protected array $items,
    ) {
        parent::__construct(RichBlockTypeEnum::List);
    }

    /**
     * @return RichBlockListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param RichBlockListItem[] $items
     *
     * @return RichBlockList
     */
    public function setItems(array $items): RichBlockList
    {
        $this->items = $items;

        return $this;
    }
}

// endregion CLASS_RichBlockList
