<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region CLASS_RichTextSpoiler
/**
 * A text covered by a spoiler.
 *
 * @see https://core.telegram.org/bots/api#richtextspoiler
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Spoiler->value))]
final class RichTextSpoiler extends AbstractRichText
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
        parent::__construct(RichTextTypeEnum::Spoiler);
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
     * @return RichTextSpoiler
     */
    public function setText(AbstractRichText|string|array $text): RichTextSpoiler
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_RichTextSpoiler
