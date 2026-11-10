<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_RichBlockButtonsAlignEnum
/**
 * Enumeration of Rich Block Buttons Align types in Telegram Bot API.
 *
 * @see RichBlockButtons
 */
enum RichBlockButtonsAlignEnum: string
{
    /** Left horizontal alignment */
    case Left = 'left';
    /** Center horizontal alignment */
    case Center = 'center';
    /** Right horizontal alignment */
    case Right = 'right';
}
// endregion ENUM_RichBlockButtonsAlignEnum
