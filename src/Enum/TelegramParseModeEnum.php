<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_TelegramParseModeEnum
enum TelegramParseModeEnum: string
{
    case Markdown = 'Markdown';
    case MarkdownV2 = 'MarkdownV2';
    case Html = 'HTML';
}
// endregion ENUM_TelegramParseModeEnum
