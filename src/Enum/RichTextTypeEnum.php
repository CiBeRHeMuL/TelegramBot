<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_RichTextTypeEnum
/**
 * Enumeration of Rich Text Type types in Telegram Bot API.
 *
 * @see AbstractRichText
 */
enum RichTextTypeEnum: string
{
    /** Bold text */
    case Bold = 'bold';
    /** Italicized text */
    case Italic = 'italic';
    /** Underlined text */
    case Underline = 'underline';
    /** Strikethrough text */
    case Strikethrough = 'strikethrough';
    /** Spoiler / hidden text */
    case Spoiler = 'spoiler';
    /** Formatted date and time */
    case DateTime = 'date_time';
    /** Mention of a Telegram user by their identifier */
    case TextMention = 'text_mention';
    /** Subscript text */
    case Subscript = 'subscript';
    /** Superscript text */
    case Superscript = 'superscript';
    /** Marked / highlighted text */
    case Marked = 'marked';
    /** Monowidth code text */
    case Code = 'code';
    /** Custom emoji */
    case CustomEmoji = 'custom_emoji';
    /** Mathematical expression in LaTeX format */
    case MathematicalExpression = 'mathematical_expression';
    /** Text with a hyperlink */
    case Url = 'url';
    /** Text with an email address */
    case EmailAddress = 'email_address';
    /** Text with a phone number */
    case PhoneNumber = 'phone_number';
    /** Text with a bank card number */
    case BankCardNumber = 'bank_card_number';
    /** Inline mention of a user (@username) */
    case Mention = 'mention';
    /** Inline hashtag (#hashtag) */
    case Hashtag = 'hashtag';
    /** Inline cashtag ($USD) */
    case Cashtag = 'cashtag';
    /** Inline bot command (/start) */
    case BotCommand = 'bot_command';
    /** Anchor definition */
    case Anchor = 'anchor';
    /** Link to an anchor */
    case AnchorLink = 'anchor_link';
    /** Reference definition */
    case Reference = 'reference';
    /** Link to a reference */
    case ReferenceLink = 'reference_link';
    /** Button inside rich text */
    case Button = 'button';
}
// endregion ENUM_RichTextTypeEnum
