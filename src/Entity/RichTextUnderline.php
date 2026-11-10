<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region CLASS_RichTextUnderline
/**
 * An underlined text.
 *
 * @see https://core.telegram.org/bots/api#richtextunderline
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Underline->value))]
final class RichTextUnderline extends AbstractRichText
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
        parent::__construct(RichTextTypeEnum::Underline);
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
     * @return RichTextUnderline
     */
    public function setText(AbstractRichText|string|array $text): RichTextUnderline
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_RichTextUnderline
