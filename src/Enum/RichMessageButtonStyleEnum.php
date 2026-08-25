<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of Rich Message Button Style types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Added in Bot API 10.3
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichMessageButtonStyleEnum, Rich Message Button Style, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_RichMessageButtonStyleEnum
/**
 * Enumeration of Rich Message Button Style types in Telegram Bot API.
 *
 * @see RichMessageButton
 */
enum RichMessageButtonStyleEnum: string
{
    /** @purpose Danger style (red) */
    case Danger = 'danger';
    /** @purpose Success style (green) */
    case Success = 'success';
    /** @purpose Primary style (blue) */
    case Primary = 'primary';
    /** @purpose Link style, the button is shown as a regular link without borders; allowed only for callback buttons */
    case Link = 'link';
}
// endregion ENUM_RichMessageButtonStyleEnum
