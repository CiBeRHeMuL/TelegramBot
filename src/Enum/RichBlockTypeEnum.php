<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of Rich Block Type types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockTypeEnum, Rich Block Type, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_RichBlockTypeEnum
/**
 * Enumeration of Rich Block Type types in Telegram Bot API.
 *
 * @see AbstractRichBlock
 */
enum RichBlockTypeEnum: string
{
    /** @purpose Text paragraph (<p>) */
    case Paragraph = 'paragraph';
    /** @purpose Section heading (<h1>-<h6>) */
    case Heading = 'heading';
    /** @purpose Preformatted text (<pre><code>) */
    case Pre = 'pre';
    /** @purpose Footer (<footer>) */
    case Footer = 'footer';
    /** @purpose Divider / horizontal rule (<hr/>) */
    case Divider = 'divider';
    /** @purpose Mathematical expression in LaTeX format */
    case MathematicalExpression = 'mathematical_expression';
    /** @purpose Anchor with name */
    case Anchor = 'anchor';
    /** @purpose List (<ul> / <ol>) */
    case List = 'list';
    /** @purpose Block quotation (<blockquote>) */
    case Blockquote = 'blockquote';
    /** @purpose Pull quotation / centered quote (<aside>) */
    case Pullquote = 'pullquote';
    /** @purpose Collage (<tg-collage>) */
    case Collage = 'collage';
    /** @purpose Slideshow (<tg-slideshow>) */
    case Slideshow = 'slideshow';
    /** @purpose Table (<table>) */
    case Table = 'table';
    /** @purpose Expandable details (<details>) */
    case Details = 'details';
    /** @purpose Map block (<tg-map>) */
    case Map = 'map';
    /** @purpose Animation block (<video>) */
    case Animation = 'animation';
    /** @purpose Audio block (<audio>) */
    case Audio = 'audio';
    /** @purpose Photo block (<photo>) */
    case Photo = 'photo';
    /** @purpose Video block (<video>) */
    case Video = 'video';
    /** @purpose Voice note block (<audio>) */
    case VoiceNote = 'voice_note';
    /** @purpose Thinking placeholder (<tg-thinking>) */
    case Thinking = 'thinking';
}
// endregion ENUM_RichBlockTypeEnum
