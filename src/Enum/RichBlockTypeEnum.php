<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_RichBlockTypeEnum
/**
 * Enumeration of Rich Block Type types in Telegram Bot API.
 *
 * @see AbstractRichBlock
 */
enum RichBlockTypeEnum: string
{
    /** Text paragraph (<p>) */
    case Paragraph = 'paragraph';
    /** Section heading (<h1>-<h6>) */
    case Heading = 'heading';
    /** Preformatted text (<pre><code>) */
    case Pre = 'pre';
    /** Footer (<footer>) */
    case Footer = 'footer';
    /** Divider / horizontal rule (<hr/>) */
    case Divider = 'divider';
    /** Mathematical expression in LaTeX format */
    case MathematicalExpression = 'mathematical_expression';
    /** Anchor with name */
    case Anchor = 'anchor';
    /** List (<ul> / <ol>) */
    case List = 'list';
    /** Block quotation (<blockquote>) */
    case Blockquote = 'blockquote';
    /** Pull quotation / centered quote (<aside>) */
    case Pullquote = 'pullquote';
    /** Collage (<tg-collage>) */
    case Collage = 'collage';
    /** Slideshow (<tg-slideshow>) */
    case Slideshow = 'slideshow';
    /** Table (<table>) */
    case Table = 'table';
    /** Expandable details (<details>) */
    case Details = 'details';
    /** Map block (<tg-map>) */
    case Map = 'map';
    /** Animation block (<video>) */
    case Animation = 'animation';
    /** Audio block (<audio>) */
    case Audio = 'audio';
    /** Photo block (<photo>) */
    case Photo = 'photo';
    /** Video block (<video>) */
    case Video = 'video';
    /** Voice note block (<audio>) */
    case VoiceNote = 'voice_note';
    /** Thinking placeholder (<tg-thinking>) */
    case Thinking = 'thinking';
    /** Expandable block quotation, corresponding to the HTML tag <blockquote> with details */
    case ExpandableBlockquote = 'expandable_blockquote';
    /** Row of buttons (<tg-button-row>) */
    case Buttons = 'buttons';
    /** Document block (<tg-document>) */
    case Document = 'document';
}
// endregion ENUM_RichBlockTypeEnum
