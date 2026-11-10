<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_PassportElementErrorDataFieldTypeEnum
enum PassportElementErrorDataFieldTypeEnum: string
{
    case PersonalDetails = 'personal_details';
    case Passport = 'passport';
    case DriverLicense = 'driver_license';
    case IdentityCard = 'identity_card';
    case InternalPassport = 'internal_passport';
    case Address = 'address';
}
// endregion ENUM_PassportElementErrorDataFieldTypeEnum
