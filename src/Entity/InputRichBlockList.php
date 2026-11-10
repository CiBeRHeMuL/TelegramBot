<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_InputRichBlockList
/**
 * A list of blocks, corresponding to the HTML tag <ul> or <ol> with multiple nested tags <li>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblocklist
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::List->value))]
final class InputRichBlockList extends AbstractInputRichBlock
{
    /**
     * @param InputRichBlockListItem[] $items Items of the list
     *
     * @see https://core.telegram.org/bots/api#inputrichblocklistitem InputRichBlockListItem
     */
    public function __construct(
        #[ArrayType(InputRichBlockListItem::class)]
        protected array $items,
    ) {
        parent::__construct(RichBlockTypeEnum::List);
    }

    /**
     * @return InputRichBlockListItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param InputRichBlockListItem[] $items
     *
     * @return InputRichBlockList
     */
    public function setItems(array $items): InputRichBlockList
    {
        $this->items = $items;

        return $this;
    }
}

// endregion CLASS_InputRichBlockList
