<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_RichBlockListItemTypeEnum
/**
 * Enumeration of Rich Block List Item Type types in Telegram Bot API.
 *
 * @see RichBlockListItem
 */
enum RichBlockListItemTypeEnum: string
{
    /** Lowercase letters (a, b, c, ...) */
    case LowercaseLetters = 'a';
    /** Uppercase letters (A, B, C, ...) */
    case UppercaseLetters = 'A';
    /** Lowercase Roman numerals (i, ii, iii, ...) */
    case LowercaseRomanNumerals = 'i';
    /** Uppercase Roman numerals (I, II, III, ...) */
    case UppercaseRomanNumerals = 'I';
    /** Decimal numbers (1, 2, 3, ...) */
    case DecimalNumbers = '1';
}
// endregion ENUM_RichBlockListItemTypeEnum
