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
 * @purpose A subscript text.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextsubscript
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextSubscript, Telegram, Bot API, DTO, Rich Text Subscript
// STRUCTURE: ▶ ┌type,text┐ → ∑ RichTextSubscript
// region CLASS_RichTextSubscript
/**
 * A subscript text.
 *
 * @see https://core.telegram.org/bots/api#richtextsubscript
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Subscript->value))]
final class RichTextSubscript extends AbstractRichText
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
        parent::__construct(RichTextTypeEnum::Subscript);
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
     * @return RichTextSubscript
     */
    public function setText(AbstractRichText|string|array $text): RichTextSubscript
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_RichTextSubscript
