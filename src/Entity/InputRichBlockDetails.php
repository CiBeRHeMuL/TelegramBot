<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_InputRichBlockDetails
/**
 * An expandable block for details disclosure, corresponding to the HTML tag <details>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdetails
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Details->value))]
final class InputRichBlockDetails extends AbstractInputRichBlock
{
    /**
     * @param AbstractRichText|string|array $summary Always shown summary of the block
     * @param AbstractInputRichBlock[]      $blocks  Content of the block
     * @param bool|null                     $is_open Optional. Pass True if the content of the block is visible by default
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     * @see https://core.telegram.org/bots/api#inputrichblockRichBlock
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $summary,
        #[ArrayType(AbstractInputRichBlock::class)]
        protected array $blocks,
        protected ?bool $is_open = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Details);
    }

    /**
     * @return AbstractRichText|string|array
     */
    public function getSummary(): AbstractRichText|string|array
    {
        return $this->summary;
    }

    /**
     * @param AbstractRichText|string|array $summary
     *
     * @return InputRichBlockDetails
     */
    public function setSummary(AbstractRichText|string|array $summary): InputRichBlockDetails
    {
        $this->summary = $summary;

        return $this;
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
     * @return InputRichBlockDetails
     */
    public function setBlocks(array $blocks): InputRichBlockDetails
    {
        $this->blocks = $blocks;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsOpen(): ?bool
    {
        return $this->is_open;
    }

    /**
     * @param bool|null $is_open
     *
     * @return InputRichBlockDetails
     */
    public function setIsOpen(?bool $is_open): InputRichBlockDetails
    {
        $this->is_open = $is_open;

        return $this;
    }
}

// endregion CLASS_InputRichBlockDetails
