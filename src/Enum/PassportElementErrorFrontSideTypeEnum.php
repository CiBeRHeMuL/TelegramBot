<?php

namespace AndrewGos\TelegramBot\Enum;

enum PassportElementErrorFrontSideTypeEnum: string
{
    case Passport = 'passport';
    case DriverLicense = 'driver_license';
    case IdentityCard = 'identity_card';
    case InternalPassport = 'internal_passport';
}
