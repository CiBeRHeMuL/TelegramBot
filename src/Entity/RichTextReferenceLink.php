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
 * @purpose A link to a reference.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextreferencelink
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextReferenceLink, Telegram, Bot API, DTO, Rich Text Reference Link
// STRUCTURE: ▶ ┌type,text,reference_name┐ → ∑ RichTextReferenceLink
// region CLASS_RichTextReferenceLink
/**
 * A link to a reference.
 *
 * @see https://core.telegram.org/bots/api#richtextreferencelink
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::ReferenceLink->value))]
final class RichTextReferenceLink extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text           The link text
     * @param string                        $reference_name The name of the reference
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected string $reference_name,
    ) {
        parent::__construct(RichTextTypeEnum::ReferenceLink);
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
     * @return RichTextReferenceLink
     */
    public function setText(AbstractRichText|string|array $text): RichTextReferenceLink
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceName(): string
    {
        return $this->reference_name;
    }

    /**
     * @param string $reference_name
     *
     * @return RichTextReferenceLink
     */
    public function setReferenceName(string $reference_name): RichTextReferenceLink
    {
        $this->reference_name = $reference_name;

        return $this;
    }
}

// endregion CLASS_RichTextReferenceLink
