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
 * @purpose An expandable block for details disclosure, corresponding to the HTML tag <details>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockdetails
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockDetails, Telegram, Bot API, DTO, Rich Block Details
// STRUCTURE: ▶ ┌type,summary,blocks,is_open┐ → ∑ RichBlockDetails
// region CLASS_RichBlockDetails
/**
 * An expandable block for details disclosure, corresponding to the HTML tag <details>.
 *
 * @see https://core.telegram.org/bots/api#richblockdetails
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Details->value))]
final class RichBlockDetails extends AbstractRichBlock
{
    /**
     * @param AbstractRichText|string|array $summary Always shown summary of the block
     * @param AbstractRichBlock[]           $blocks  Content of the block
     * @param bool|null                     $is_open Optional. True, if the content of the block is visible by default
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     * @see https://core.telegram.org/bots/api#richblock RichBlock
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $summary,
        #[ArrayType(AbstractRichBlock::class)]
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
     * @return RichBlockDetails
     */
    public function setSummary(AbstractRichText|string|array $summary): RichBlockDetails
    {
        $this->summary = $summary;

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
     * @return RichBlockDetails
     */
    public function setBlocks(array $blocks): RichBlockDetails
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
     * @return RichBlockDetails
     */
    public function setIsOpen(?bool $is_open): RichBlockDetails
    {
        $this->is_open = $is_open;

        return $this;
    }
}

// endregion CLASS_RichBlockDetails
