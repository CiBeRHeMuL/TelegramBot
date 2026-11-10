<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_PassportElementErrorTranslationFilesTypeEnum
enum PassportElementErrorTranslationFilesTypeEnum: string
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
// endregion ENUM_PassportElementErrorTranslationFilesTypeEnum
