<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of owned gift types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: OwnedGiftType, gift, owned, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_OwnedGiftTypeEnum
enum OwnedGiftTypeEnum: string
{
    case Regular = 'regular';
    case Unique = 'unique';
}
// endregion ENUM_OwnedGiftTypeEnum
