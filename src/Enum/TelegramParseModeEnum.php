<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of text parse modes (Markdown, HTML) in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TelegramParseMode, parse, mode, Markdown, HTML, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_TelegramParseModeEnum
enum TelegramParseModeEnum: string
{
    case Markdown = 'Markdown';
    case MarkdownV2 = 'MarkdownV2';
    case Html = 'HTML';
}
// endregion ENUM_TelegramParseModeEnum
