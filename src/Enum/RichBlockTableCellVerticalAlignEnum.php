<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of Rich Block Table Cell Vertical Align types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockTableCellVerticalAlignEnum, Rich Block Table Cell Vertical Align, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_RichBlockTableCellVerticalAlignEnum
/**
 * Enumeration of Rich Block Table Cell Vertical Align types in Telegram Bot API.
 *
 * @see RichBlockTableCell
 */
enum RichBlockTableCellVerticalAlignEnum: string
{
    /** @purpose Top vertical alignment */
    case Top = 'top';
    /** @purpose Middle vertical alignment */
    case Middle = 'middle';
    /** @purpose Bottom vertical alignment */
    case Bottom = 'bottom';
}
// endregion ENUM_RichBlockTableCellVerticalAlignEnum
