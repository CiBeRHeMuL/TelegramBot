<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of Rich Block List Item Type types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockListItemTypeEnum, Rich Block List Item Type, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_RichBlockListItemTypeEnum
/**
 * Enumeration of Rich Block List Item Type types in Telegram Bot API.
 *
 * @see RichBlockListItem
 */
enum RichBlockListItemTypeEnum: string
{
    /** @purpose Lowercase letters (a, b, c, ...) */
    case LowercaseLetters = 'a';
    /** @purpose Uppercase letters (A, B, C, ...) */
    case UppercaseLetters = 'A';
    /** @purpose Lowercase Roman numerals (i, ii, iii, ...) */
    case LowercaseRomanNumerals = 'i';
    /** @purpose Uppercase Roman numerals (I, II, III, ...) */
    case UppercaseRomanNumerals = 'I';
    /** @purpose Decimal numbers (1, 2, 3, ...) */
    case DecimalNumbers = '1';
}
// endregion ENUM_RichBlockListItemTypeEnum
