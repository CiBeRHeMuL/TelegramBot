<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_InputRichBlockParagraph
/**
 * A text paragraph, corresponding to the HTML tag <p>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockparagraph
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Paragraph->value))]
final class InputRichBlockParagraph extends AbstractInputRichBlock
{
    /**
     * @param AbstractRichText|string|array $text Text of the block
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
    ) {
        parent::__construct(RichBlockTypeEnum::Paragraph);
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
     * @return InputRichBlockParagraph
     */
    public function setText(AbstractRichText|string|array $text): InputRichBlockParagraph
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_InputRichBlockParagraph
