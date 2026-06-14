<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents a rich formatted text.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtext
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 *
 * @modulemap
 * CLASS 5[RichText types] => AbstractRichText
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractRichText, Telegram Bot API, abstract, RichText, DTO
// STRUCTURE: ▶ ┌type: RichTextTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractRichText [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object represents a rich formatted text.
 *
 * @see https://core.telegram.org/bots/api#richtext
 */
#[AvailableInheritors([
    RichTextBold::class,
    RichTextItalic::class,
    RichTextUnderline::class,
    RichTextStrikethrough::class,
    RichTextSpoiler::class,
    RichTextDateTime::class,
    RichTextTextMention::class,
    RichTextSubscript::class,
    RichTextSuperscript::class,
    RichTextMarked::class,
    RichTextCode::class,
    RichTextCustomEmoji::class,
    RichTextMathematicalExpression::class,
    RichTextUrl::class,
    RichTextEmailAddress::class,
    RichTextPhoneNumber::class,
    RichTextBankCardNumber::class,
    RichTextMention::class,
    RichTextHashtag::class,
    RichTextCashtag::class,
    RichTextBotCommand::class,
    RichTextAnchor::class,
    RichTextAnchorLink::class,
    RichTextReference::class,
    RichTextReferenceLink::class,
])]
abstract class AbstractRichText implements EntityInterface
{
    public function __construct(
        protected readonly RichTextTypeEnum $type,
    ) {}

    public function getType(): RichTextTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractRichText
