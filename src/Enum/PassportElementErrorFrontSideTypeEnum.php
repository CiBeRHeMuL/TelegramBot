<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of passport element error front side types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PassportElementErrorFrontSideType, passport, error, front, side, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_PassportElementErrorFrontSideTypeEnum
enum PassportElementErrorFrontSideTypeEnum: string
{
    case Passport = 'passport';
    case DriverLicense = 'driver_license';
    case IdentityCard = 'identity_card';
    case InternalPassport = 'internal_passport';
}
// endregion ENUM_PassportElementErrorFrontSideTypeEnum
