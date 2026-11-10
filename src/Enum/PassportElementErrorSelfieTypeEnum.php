<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region ENUM_PassportElementErrorSelfieTypeEnum
enum PassportElementErrorSelfieTypeEnum: string
{
    case Passport = 'passport';
    case DriverLicense = 'driver_license';
    case IdentityCard = 'identity_card';
    case InternalPassport = 'internal_passport';
}
// endregion ENUM_PassportElementErrorSelfieTypeEnum
