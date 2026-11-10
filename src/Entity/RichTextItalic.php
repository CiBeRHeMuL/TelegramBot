<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region CLASS_RichTextItalic
/**
 * An italicized text.
 *
 * @see https://core.telegram.org/bots/api#richtextitalic
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Italic->value))]
final class RichTextItalic extends AbstractRichText
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
        parent::__construct(RichTextTypeEnum::Italic);
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
     * @return RichTextItalic
     */
    public function setText(AbstractRichText|string|array $text): RichTextItalic
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_RichTextItalic
