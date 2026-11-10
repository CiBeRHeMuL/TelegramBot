<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region CLASS_AbstractRichText
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
    RichTextButton::class,
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
