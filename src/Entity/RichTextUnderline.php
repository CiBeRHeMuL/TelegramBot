<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose An underlined text.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextunderline
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextUnderline, Telegram, Bot API, DTO, Rich Text Underline
// STRUCTURE: ▶ ┌type,text┐ → ∑ RichTextUnderline
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
