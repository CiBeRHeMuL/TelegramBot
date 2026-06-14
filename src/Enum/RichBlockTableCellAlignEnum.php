<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of Rich Block Table Cell Align types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockTableCellAlignEnum, Rich Block Table Cell Align, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_RichBlockTableCellAlignEnum
/**
 * Enumeration of Rich Block Table Cell Align types in Telegram Bot API.
 *
 * @see RichBlockTableCell
 */
enum RichBlockTableCellAlignEnum: string
{
    /** @purpose Left horizontal alignment */
    case Left = 'left';
    /** @purpose Center horizontal alignment */
    case Center = 'center';
    /** @purpose Right horizontal alignment */
    case Right = 'right';
}
// endregion ENUM_RichBlockTableCellAlignEnum
