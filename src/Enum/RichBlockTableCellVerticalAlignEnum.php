<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_RichBlockTableCellVerticalAlignEnum
/**
 * Enumeration of Rich Block Table Cell Vertical Align types in Telegram Bot API.
 *
 * @see RichBlockTableCell
 */
enum RichBlockTableCellVerticalAlignEnum: string
{
    /** Top vertical alignment */
    case Top = 'top';
    /** Middle vertical alignment */
    case Middle = 'middle';
    /** Bottom vertical alignment */
    case Bottom = 'bottom';
}
// endregion ENUM_RichBlockTableCellVerticalAlignEnum
