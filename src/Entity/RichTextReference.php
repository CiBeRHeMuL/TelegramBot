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
 * @purpose A reference.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextreference
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextReference, Telegram, Bot API, DTO, Rich Text Reference
// STRUCTURE: ▶ ┌type,text,name┐ → ∑ RichTextReference
// region CLASS_RichTextReference
/**
 * A reference.
 *
 * @see https://core.telegram.org/bots/api#richtextreference
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Reference->value))]
final class RichTextReference extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text Text of the reference
     * @param string                        $name The name of the reference
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected string $name,
    ) {
        parent::__construct(RichTextTypeEnum::Reference);
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
     * @return RichTextReference
     */
    public function setText(AbstractRichText|string|array $text): RichTextReference
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return RichTextReference
     */
    public function setName(string $name): RichTextReference
    {
        $this->name = $name;

        return $this;
    }
}

// endregion CLASS_RichTextReference
