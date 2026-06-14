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
 * @purpose A bold text.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextbold
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextBold, Telegram, Bot API, DTO, Rich Text Bold
// STRUCTURE: ▶ ┌type,text┐ → ∑ RichTextBold
// region CLASS_RichTextBold
/**
 * A bold text.
 *
 * @see https://core.telegram.org/bots/api#richtextbold
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Bold->value))]
final class RichTextBold extends AbstractRichText
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
        parent::__construct(RichTextTypeEnum::Bold);
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
     * @return RichTextBold
     */
    public function setText(AbstractRichText|string|array $text): RichTextBold
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_RichTextBold
