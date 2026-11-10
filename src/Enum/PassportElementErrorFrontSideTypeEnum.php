<?php

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_PassportElementErrorFrontSideTypeEnum
enum PassportElementErrorFrontSideTypeEnum: string
{
    case Passport = 'passport';
    case DriverLicense = 'driver_license';
    case IdentityCard = 'identity_card';
    case InternalPassport = 'internal_passport';
}
// endregion ENUM_PassportElementErrorFrontSideTypeEnum
