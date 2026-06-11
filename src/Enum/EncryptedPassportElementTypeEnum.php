<?php

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of encrypted passport element types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: EncryptedPassportElementType, passport, encrypted, element, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_EncryptedPassportElementTypeEnum
enum EncryptedPassportElementTypeEnum: string
{
    case PersonalDetails = 'personal_details';
    case Passport = 'passport';
    case DriverLicense = 'driver_license';
    case IdentityCard = 'identity_card';
    case InternalPassport = 'internal_passport';
    case Address = 'address';
    case UtilityBill = 'utility_bill';
    case BankStatement = 'bank_statement';
    case RentalAgreement = 'rental_agreement';
    case PassportRegistration = 'passport_registration';
    case TemporaryRegistration = 'temporary_registration';
    case PhoneNumber = 'phone_number';
    case Email = 'email';
}
// endregion ENUM_EncryptedPassportElementTypeEnum
