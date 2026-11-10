<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_InputRichBlockSectionHeading
/**
 * A section heading, corresponding to the HTML tags <h1>, <h2>, <h3>, <h4>, <h5>, or <h6>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblocksectionheading
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Heading->value))]
final class InputRichBlockSectionHeading extends AbstractInputRichBlock
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
     * @return InputRichBlockSectionHeading
     */
    public function setText(AbstractRichText|string|array $text): InputRichBlockSectionHeading
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
     * @return InputRichBlockSectionHeading
     */
    public function setSize(int $size): InputRichBlockSectionHeading
    {
        $this->size = $size;

        return $this;
    }
}

// endregion CLASS_InputRichBlockSectionHeading
