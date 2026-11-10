<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_RichBlockTableCellAlignEnum
/**
 * Enumeration of Rich Block Table Cell Align types in Telegram Bot API.
 *
 * @see RichBlockTableCell
 */
enum RichBlockTableCellAlignEnum: string
{
    /** Left horizontal alignment */
    case Left = 'left';
    /** Center horizontal alignment */
    case Center = 'center';
    /** Right horizontal alignment */
    case Right = 'right';
}
// endregion ENUM_RichBlockTableCellAlignEnum
