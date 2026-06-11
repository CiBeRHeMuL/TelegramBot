<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of passport element error translation file types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PassportElementErrorTranslationFileType, passport, error, translation, file, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_PassportElementErrorTranslationFileTypeEnum
enum PassportElementErrorTranslationFileTypeEnum: string
{
    case Passport = 'passport';
    case DriverLicense = 'driver_license';
    case IdentityCard = 'identity_card';
    case InternalPassport = 'internal_passport';
    case UtilityBill = 'utility_bill';
    case BankStatement = 'bank_statement';
    case RentalAgreement = 'rental_agreement';
    case PassportRegistration = 'passport_registration';
    case TemporaryRegistration = 'temporary_registration';
}
// endregion ENUM_PassportElementErrorTranslationFileTypeEnum
