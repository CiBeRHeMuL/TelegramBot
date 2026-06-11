<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of passport element error reverse side types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PassportElementErrorReverseSideType, passport, error, reverse, side, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_PassportElementErrorReverseSideTypeEnum
enum PassportElementErrorReverseSideTypeEnum: string
{
    case DriverLicense = 'driver_license';
    case IdentityCard = 'identity_card';
}
// endregion ENUM_PassportElementErrorReverseSideTypeEnum
