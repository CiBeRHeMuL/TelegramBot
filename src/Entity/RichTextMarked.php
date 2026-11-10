<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region CLASS_RichTextMarked
/**
 * A marked text.
 *
 * @see https://core.telegram.org/bots/api#richtextmarked
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Marked->value))]
final class RichTextMarked extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text The text
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
    ) {
        parent::__construct(RichTextTypeEnum::Marked);
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
     * @return RichTextMarked
     */
    public function setText(AbstractRichText|string|array $text): RichTextMarked
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_RichTextMarked
