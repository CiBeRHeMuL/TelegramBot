<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_PassportElementErrorFilesTypeEnum
enum PassportElementErrorFilesTypeEnum: string
{
    case UtilityBill = 'utility_bill';
    case BankStatement = 'bank_statement';
    case RentalAgreement = 'rental_agreement';
    case PassportRegistration = 'passport_registration';
    case TemporaryRegistration = 'temporary_registration';
}
// endregion ENUM_PassportElementErrorFilesTypeEnum
