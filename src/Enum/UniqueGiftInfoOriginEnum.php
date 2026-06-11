<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of unique gift info origin types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UniqueGiftInfoOrigin, unique, gift, origin, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_UniqueGiftInfoOriginEnum
enum UniqueGiftInfoOriginEnum: string
{
    case Upgrade = 'upgrade';
    case Transfer = 'transfer';
    case Resale = 'resale';
}
// endregion ENUM_UniqueGiftInfoOriginEnum
