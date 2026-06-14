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
 * @purpose A section heading, corresponding to the HTML tags <h1>, <h2>, <h3>, <h4>, <h5>, or <h6>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblocksectionheading
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockSectionHeading, Telegram, Bot API, DTO, Rich Block Section Heading
// STRUCTURE: ▶ ┌type,text,size┐ → ∑ RichBlockSectionHeading
// region CLASS_RichBlockSectionHeading
/**
 * A section heading, corresponding to the HTML tags <h1>, <h2>, <h3>, <h4>, <h5>, or <h6>.
 *
 * @see https://core.telegram.org/bots/api#richblocksectionheading
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Heading->value))]
final class RichBlockSectionHeading extends AbstractRichBlock
{
    /**
     * @param AbstractRichText|string|array $text Text of the block
     * @param int                           $size Relative size of the text font; 1-6, 1 is the largest, 6 is the smallest
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected int $size,
    ) {
        parent::__construct(RichBlockTypeEnum::Heading);
    }

    /**
     * @return AbstractRichText|string|array
     */
    public function getText(): AbstractRichText|string|array
    {
        return $this->text;
    }

    /**
     * @param AbstractRichText|string|array $text
     *
     * @return RichBlockSectionHeading
     */
    public function setText(AbstractRichText|string|array $text): RichBlockSectionHeading
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     *
     * @return RichBlockSectionHeading
     */
    public function setSize(int $size): RichBlockSectionHeading
    {
        $this->size = $size;

        return $this;
    }
}

// endregion CLASS_RichBlockSectionHeading
