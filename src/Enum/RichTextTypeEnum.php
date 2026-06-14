<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of Rich Text Type types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextTypeEnum, Rich Text Type, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_RichTextTypeEnum
/**
 * Enumeration of Rich Text Type types in Telegram Bot API.
 *
 * @see AbstractRichText
 */
enum RichTextTypeEnum: string
{
    /** @purpose Bold text */
    case Bold = 'bold';
    /** @purpose Italicized text */
    case Italic = 'italic';
    /** @purpose Underlined text */
    case Underline = 'underline';
    /** @purpose Strikethrough text */
    case Strikethrough = 'strikethrough';
    /** @purpose Spoiler / hidden text */
    case Spoiler = 'spoiler';
    /** @purpose Formatted date and time */
    case DateTime = 'date_time';
    /** @purpose Mention of a Telegram user by their identifier */
    case TextMention = 'text_mention';
    /** @purpose Subscript text */
    case Subscript = 'subscript';
    /** @purpose Superscript text */
    case Superscript = 'superscript';
    /** @purpose Marked / highlighted text */
    case Marked = 'marked';
    /** @purpose Monowidth code text */
    case Code = 'code';
    /** @purpose Custom emoji */
    case CustomEmoji = 'custom_emoji';
    /** @purpose Mathematical expression in LaTeX format */
    case MathematicalExpression = 'mathematical_expression';
    /** @purpose Text with a hyperlink */
    case Url = 'url';
    /** @purpose Text with an email address */
    case EmailAddress = 'email_address';
    /** @purpose Text with a phone number */
    case PhoneNumber = 'phone_number';
    /** @purpose Text with a bank card number */
    case BankCardNumber = 'bank_card_number';
    /** @purpose Inline mention of a user (@username) */
    case Mention = 'mention';
    /** @purpose Inline hashtag (#hashtag) */
    case Hashtag = 'hashtag';
    /** @purpose Inline cashtag ($USD) */
    case Cashtag = 'cashtag';
    /** @purpose Inline bot command (/start) */
    case BotCommand = 'bot_command';
    /** @purpose Anchor definition */
    case Anchor = 'anchor';
    /** @purpose Link to an anchor */
    case AnchorLink = 'anchor_link';
    /** @purpose Reference definition */
    case Reference = 'reference';
    /** @purpose Link to a reference */
    case ReferenceLink = 'reference_link';
}
// endregion ENUM_RichTextTypeEnum
