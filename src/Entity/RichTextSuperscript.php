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
 * @purpose A superscript text.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextsuperscript
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextSuperscript, Telegram, Bot API, DTO, Rich Text Superscript
// STRUCTURE: ▶ ┌type,text┐ → ∑ RichTextSuperscript
// region CLASS_RichTextSuperscript
/**
 * A superscript text.
 *
 * @see https://core.telegram.org/bots/api#richtextsuperscript
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Superscript->value))]
final class RichTextSuperscript extends AbstractRichText
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
        parent::__construct(RichTextTypeEnum::Superscript);
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
     * @return RichTextSuperscript
     */
    public function setText(AbstractRichText|string|array $text): RichTextSuperscript
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_RichTextSuperscript
