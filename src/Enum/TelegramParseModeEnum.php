<?php

namespace AndrewGos\TelegramBot\Enum;

enum TelegramParseModeEnum: string
{
    case Markdown = 'Markdown';
    case MarkdownV2 = 'MarkdownV2';
    case Html = 'HTML';
}
