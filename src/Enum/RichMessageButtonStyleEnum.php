<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_RichMessageButtonStyleEnum
/**
 * Enumeration of Rich Message Button Style types in Telegram Bot API.
 *
 * @see RichMessageButton
 */
enum RichMessageButtonStyleEnum: string
{
    /** Danger style (red) */
    case Danger = 'danger';
    /** Success style (green) */
    case Success = 'success';
    /** Primary style (blue) */
    case Primary = 'primary';
    /** Link style, the button is shown as a regular link without borders; allowed only for callback buttons */
    case Link = 'link';
}
// endregion ENUM_RichMessageButtonStyleEnum
